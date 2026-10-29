<?php

namespace Tests\Feature;

use App\Models\Question;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AdminQuestionManagementTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutVite();
    }

    public function test_admin_can_create_a_question_with_four_options_and_an_image(): void
    {
        Storage::fake('question_images');

        $this->actingAs(User::factory()->admin()->create())
            ->post(route('admin.questions.store'), $this->questionData([
                'image' => UploadedFile::fake()->image('traffic-sign.png'),
            ]))
            ->assertRedirect(route('admin.questions.index'))
            ->assertSessionHas('status', 'تمت إضافة السؤال بنجاح.');

        $question = Question::query()->sole();

        $this->assertSame('ما معنى هذه الإشارة؟', $question->question);
        $this->assertSame(Question::CATEGORY_THEORY, $question->category);
        $this->assertSame([
            'a' => 'توقف',
            'b' => 'تابع السير',
            'c' => 'خفف السرعة',
            'd' => 'غيّر المسار',
        ], $question->options);
        $this->assertSame('a', $question->correct_option);
        $this->assertTrue($question->is_published);
        $this->assertNotNull($question->image_path);
        Storage::disk('question_images')->assertExists($question->image_path);

        $imageUrl = asset('images/'.$question->image_path);
        $this->actingAs(User::factory()->admin()->create())
            ->get(route('admin.questions.index'))
            ->assertOk()
            ->assertSee($imageUrl, false);

        $this->get(route('admin.questions.edit', $question))
            ->assertOk()
            ->assertSee($imageUrl, false)
            ->assertSee('الصورة الحالية للسؤال');
    }

    public function test_admin_cannot_create_a_question_without_four_options_and_one_correct_answer(): void
    {
        $this->actingAs(User::factory()->admin()->create())
            ->from(route('admin.questions.create'))
            ->post(route('admin.questions.store'), [
                'question' => 'ما معنى هذه الإشارة؟',
                'option_a' => 'توقف',
                'is_published' => '1',
            ])
            ->assertRedirect(route('admin.questions.create'))
            ->assertSessionHasErrors(['category', 'option_b', 'option_c', 'option_d', 'correct_option']);

        $this->assertDatabaseCount('questions', 0);
    }

    public function test_admin_can_update_question_content_and_remove_its_image(): void
    {
        Storage::fake('question_images');
        Storage::disk('question_images')->put('questions/old.png', 'image');
        $question = Question::create($this->questionAttributes([
            'image_path' => 'questions/old.png',
        ]));

        $this->actingAs(User::factory()->admin()->create())
            ->put(route('admin.questions.update', $question), $this->questionData([
                'question' => 'متى يجب التوقف؟',
                'category' => Question::CATEGORY_MECHANICAL,
                'correct_option' => 'b',
                'remove_image' => '1',
                'is_published' => '0',
            ]))
            ->assertRedirect(route('admin.questions.index'))
            ->assertSessionHas('status', 'تم تحديث السؤال بنجاح.');

        $question->refresh();
        $this->assertSame('متى يجب التوقف؟', $question->question);
        $this->assertSame(Question::CATEGORY_MECHANICAL, $question->category);
        $this->assertSame('b', $question->correct_option);
        $this->assertFalse($question->is_published);
        $this->assertNull($question->image_path);
        Storage::disk('question_images')->assertMissing('questions/old.png');
    }

    public function test_admin_can_delete_a_question_and_its_image(): void
    {
        Storage::fake('question_images');
        Storage::disk('question_images')->put('questions/to-delete.png', 'image');
        $question = Question::create($this->questionAttributes([
            'image_path' => 'questions/to-delete.png',
        ]));

        $this->actingAs(User::factory()->admin()->create())
            ->delete(route('admin.questions.destroy', $question))
            ->assertRedirect(route('admin.questions.index'))
            ->assertSessionHas('status', 'تم حذف السؤال.');

        $this->assertDatabaseMissing('questions', ['id' => $question->id]);
        Storage::disk('question_images')->assertMissing('questions/to-delete.png');
    }

    public function test_admin_can_open_the_question_list_create_form_and_edit_form(): void
    {
        $question = Question::create($this->questionAttributes());

        $this->actingAs(User::factory()->admin()->create())
            ->get(route('admin.dashboard'))
            ->assertOk()
            ->assertSee('بنك الأسئلة')
            ->assertSee('إضافة سؤال جديد')
            ->assertSee('توقف');

        $this->get(route('admin.questions.create'))
            ->assertOk()
            ->assertSee('نص السؤال')
            ->assertSee('تصنيف السؤال')
            ->assertSee('الميكانيكية')
            ->assertSee('الخيار أ')
            ->assertSee('الإجابة الصحيحة');

        $this->get(route('admin.questions.edit', $question))
            ->assertOk()
            ->assertSee('تعديل السؤال')
            ->assertSee('توقف');
    }

    public function test_only_admins_can_open_question_management_pages_or_submit_changes(): void
    {
        $question = Question::create($this->questionAttributes());

        $this->get(route('admin.questions.create'))->assertRedirect(route('login'));

        $this->actingAs(User::factory()->create())
            ->get(route('admin.questions.edit', $question))
            ->assertForbidden();

        $this->actingAs(User::factory()->create())
            ->post(route('admin.questions.store'), $this->questionData())
            ->assertForbidden();

        $this->assertDatabaseCount('questions', 1);
    }

    /**
     * @return array<string, mixed>
     */
    private function questionData(array $overrides = []): array
    {
        return array_replace([
            'question' => 'ما معنى هذه الإشارة؟',
            'category' => Question::CATEGORY_THEORY,
            'option_a' => 'توقف',
            'option_b' => 'تابع السير',
            'option_c' => 'خفف السرعة',
            'option_d' => 'غيّر المسار',
            'correct_option' => 'a',
            'explanation' => 'يجب الانتباه إلى الإشارة.',
            'is_published' => '1',
        ], $overrides);
    }

    /**
     * @return array<string, mixed>
     */
    private function questionAttributes(array $overrides = []): array
    {
        return array_replace([
            'question' => 'ما معنى هذه الإشارة؟',
            'options' => [
                'a' => 'توقف',
                'b' => 'تابع السير',
                'c' => 'خفف السرعة',
                'd' => 'غيّر المسار',
            ],
            'correct_option' => 'a',
            'explanation' => 'يجب الانتباه إلى الإشارة.',
            'is_published' => true,
        ], $overrides);
    }
}
