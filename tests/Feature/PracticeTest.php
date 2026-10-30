<?php

namespace Tests\Feature;

use App\Models\Question;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class PracticeTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutVite();
    }

    public function test_homepage_promotes_the_public_practice_test(): void
    {
        $this->get(route('home'))
            ->assertOk()
            ->assertSee('راجع معلوماتك واستعد للاختبار النظري')
            ->assertSee('مهارات قيادة متكاملة في مكان واحد')
            ->assertSee('أساسيات السيارة والتحكّم')
            ->assertSee('دروس متعددة للتحضير للاختبارات')
            ->assertSee('خدمة نقل متوفرة للطلاب')
            ->assertSee(route('practice.index'));
    }

    public function test_visitors_can_view_the_practice_page_without_signing_in(): void
    {
        Question::create($this->questionAttributes(['is_published' => true]));

        $this->get(route('practice.index'))
            ->assertOk()
            ->assertSee('اختبر معلوماتك في أقسام القيادة الثلاثة')
            ->assertSee('النظرية')
            ->assertSee('الميكانيكية')
            ->assertSee('الإشارات')
            ->assertSee('10 أسئلة على الأقل في كل قسم');

        $this->assertGuest();
    }

    public function test_practice_cannot_start_until_ten_questions_are_published_in_each_category(): void
    {
        foreach (Question::categories() as $category => $label) {
            $count = $category === Question::CATEGORY_SIGNS ? 9 : 10;

            foreach (range(1, $count) as $number) {
                Question::create($this->questionAttributes([
                    'category' => $category,
                    'question' => "{$label} question {$number}",
                    'is_published' => true,
                ]));
            }
        }

        $this->from(route('practice.index'))
            ->post(route('practice.start'))
            ->assertRedirect(route('practice.index'))
            ->assertSessionHas('error', 'يلزم نشر 10 أسئلة على الأقل في كل قسم. الأقسام غير المكتملة: الإشارات (9/10).');
    }

    public function test_visitors_can_answer_thirty_random_questions_and_review_their_result(): void
    {
        Storage::fake('question_images');
        $imagePath = 'questions/theory-example.png';
        Storage::disk('question_images')->put($imagePath, 'image contents');

        foreach (Question::categories() as $category => $label) {
            foreach (range(1, 12) as $number) {
                Question::create($this->questionAttributes([
                    'category' => $category,
                    'question' => "{$label} question {$number}",
                    'image_path' => $category === Question::CATEGORY_THEORY ? $imagePath : null,
                    'is_published' => true,
                ]));
            }
        }

        Question::create($this->questionAttributes([
            'question' => 'هذا السؤال غير منشور',
            'category' => Question::CATEGORY_SIGNS,
            'is_published' => false,
        ]));

        $this->post(route('practice.start'))
            ->assertRedirect(route('practice.show'));

        $this->get(route('practice.show'))
            ->assertOk()
            ->assertSee('النظرية')
            ->assertSee('الميكانيكية')
            ->assertSee('الإشارات')
            ->assertSee('data-practice-form', false)
            ->assertSee('data-question-step', false)
            ->assertSee('id="practice-timer"', false)
            ->assertSee('السؤال 1 من 30')
            ->assertSee(asset('images/'.$imagePath), false)
            ->assertSee('صورة توضيحية للسؤال', false)
            ->assertDontSee('هذا السؤال غير منشور');

        $questionIds = session('practice.question_ids');
        $this->assertCount(30, $questionIds);
        foreach (array_keys(Question::categories()) as $category) {
            $this->assertSame(10, Question::query()
                ->whereIn('id', $questionIds)
                ->where('category', $category)
                ->count());
        }

        $answers = collect($questionIds)->mapWithKeys(fn (int $id): array => [$id => 'a'])->all();

        $this->post(route('practice.finish'), ['answers' => $answers])
            ->assertRedirect(route('practice.result'));

        $this->get(route('practice.result'))
            ->assertOk()
            ->assertSee('نتيجتك: 30 من 30')
            ->assertSee('مراجعة الإجابات')
            ->assertSee('إجابتك: توقف')
            ->assertSee('يجب الانتباه إلى الإشارة.')
            ->assertSee(asset('images/'.$imagePath), false);

        $result = session('practice.result');
        $this->assertIsArray($result['answers'][0]['question']);
        $this->assertArrayHasKey('text', $result['answers'][0]['question']);
        $this->assertSame('a', $result['answers'][0]['question']['correct_option']);
        $this->assertIsArray($result['answers'][0]['question']['options']);

        $this->assertGuest();
    }

    public function test_exam_has_a_fifteen_minute_deadline_and_scores_a_timed_out_attempt(): void
    {
        $this->createPublishedQuestions();
        $this->travelTo('2026-10-28 12:00:00');

        $this->post(route('practice.start'))
            ->assertRedirect(route('practice.show'));

        $questionIds = session('practice.question_ids');
        $this->assertSame(now()->addMinutes(15)->timestamp, session('practice.deadline'));
        $this->get(route('practice.show'))
            ->assertOk()
            ->assertSee('data-deadline="'.session('practice.deadline').'"', false);

        $this->travel(15)->minutes();
        $answers = collect($questionIds)
            ->take(3)
            ->mapWithKeys(fn (int $id): array => [$id => 'a'])
            ->all();

        $this->post(route('practice.finish'), ['answers' => $answers])
            ->assertRedirect(route('practice.result'));

        $this->get(route('practice.result'))
            ->assertOk()
            ->assertSee('انتهى الوقت')
            ->assertSee('نتيجتك: 3 من 30')
            ->assertSee('التقييم: يحتاج إلى مراجعة')
            ->assertSee('لم تتم الإجابة');
    }

    #[DataProvider('gradingCases')]
    public function test_exam_result_displays_the_grade_for_each_score_band(int $correctAnswers, string $grade): void
    {
        $this->createPublishedQuestions();
        $this->post(route('practice.start'));

        $questionIds = session('practice.question_ids');
        $answers = collect($questionIds)
            ->mapWithKeys(fn (int $id, int $index): array => [$id => $index < $correctAnswers ? 'a' : 'b'])
            ->all();

        $this->post(route('practice.finish'), ['answers' => $answers])
            ->assertRedirect(route('practice.result'));

        $this->get(route('practice.result'))
            ->assertOk()
            ->assertSee("التقييم: {$grade}")
            ->assertSee('الإجابة الصحيحة: توقف');
    }

    public static function gradingCases(): array
    {
        return [
            'excellent at 90 percent' => [27, 'ممتاز'],
            'very good at 80 percent' => [24, 'جيد جدًا'],
            'good at 70 percent' => [21, 'جيد'],
            'needs review below 70 percent' => [20, 'يحتاج إلى مراجعة'],
        ];
    }

    public function test_practice_requires_an_answer_for_every_question(): void
    {
        foreach (Question::categories() as $category => $label) {
            foreach (range(1, 10) as $number) {
                Question::create($this->questionAttributes([
                    'category' => $category,
                    'question' => "{$label} question {$number}",
                    'is_published' => true,
                ]));
            }
        }

        $this->post(route('practice.start'));

        $this->from(route('practice.show'))
            ->post(route('practice.finish'), ['answers' => []])
            ->assertRedirect(route('practice.show'))
            ->assertSessionHasErrors('answers');
    }

    public function test_result_page_requires_a_completed_practice_session(): void
    {
        $this->get(route('practice.result'))
            ->assertRedirect(route('practice.index'))
            ->assertSessionHas('error', 'لا توجد نتيجة لعرضها. ابدأ اختبارًا جديدًا.');
    }

    /**
     * @return array<string, mixed>
     */
    private function questionAttributes(array $overrides = []): array
    {
        return array_replace([
            'question' => 'ما معنى هذه الإشارة؟',
            'category' => Question::CATEGORY_THEORY,
            'options' => [
                'a' => 'توقف',
                'b' => 'تابع السير',
                'c' => 'خفف السرعة',
                'd' => 'غيّر المسار',
            ],
            'correct_option' => 'a',
            'explanation' => 'يجب الانتباه إلى الإشارة.',
            'is_published' => false,
        ], $overrides);
    }

    private function createPublishedQuestions(): void
    {
        foreach (Question::categories() as $category => $label) {
            foreach (range(1, 10) as $number) {
                Question::create($this->questionAttributes([
                    'category' => $category,
                    'question' => "{$label} question {$number}",
                    'is_published' => true,
                ]));
            }
        }
    }
}
