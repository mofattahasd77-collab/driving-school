<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class PracticeController extends Controller
{
    private const QUESTIONS_PER_CATEGORY = 10;

    private const EXAM_DURATION_MINUTES = 15;

    public function index(): View
    {
        $publishedCounts = $this->publishedCounts();

        return view('practice.index', [
            'publishedCounts' => $publishedCounts,
            'categories' => Question::categories(),
            'questionsPerCategory' => self::QUESTIONS_PER_CATEGORY,
            'questionCount' => count(Question::categories()) * self::QUESTIONS_PER_CATEGORY,
            'canStart' => collect($publishedCounts)->every(
                fn (int $count): bool => $count >= self::QUESTIONS_PER_CATEGORY
            ),
        ]);
    }

    public function start(Request $request): RedirectResponse
    {
        $publishedCounts = $this->publishedCounts();
        $missingCategories = collect(Question::categories())
            ->filter(fn (string $label, string $category): bool => $publishedCounts[$category] < self::QUESTIONS_PER_CATEGORY)
            ->map(fn (string $label, string $category): string => $label.' ('.$publishedCounts[$category].'/'.self::QUESTIONS_PER_CATEGORY.')')
            ->values();

        if ($missingCategories->isNotEmpty()) {
            return back()->with('error', 'يلزم نشر 10 أسئلة على الأقل في كل قسم. الأقسام غير المكتملة: '.$missingCategories->implode('، ').'.');
        }

        $questionIds = [];
        foreach (array_keys(Question::categories()) as $category) {
            $categoryQuestionIds = Question::published()
                ->where('category', $category)
                ->inRandomOrder()
                ->limit(self::QUESTIONS_PER_CATEGORY)
                ->pluck('id')
                ->all();

            if (count($categoryQuestionIds) !== self::QUESTIONS_PER_CATEGORY) {
                return back()->with('error', 'تغيّر بنك الأسئلة أثناء بدء الاختبار. تحقق من توفر 10 أسئلة منشورة في كل قسم ثم حاول مجددًا.');
            }

            $questionIds = [...$questionIds, ...$categoryQuestionIds];
        }

        shuffle($questionIds);

        $request->session()->put('practice.question_ids', $questionIds);
        $request->session()->put(
            'practice.deadline',
            now()->addMinutes(self::EXAM_DURATION_MINUTES)->timestamp
        );
        $request->session()->forget('practice.result');

        return redirect()->route('practice.show');
    }

    public function show(Request $request): View|RedirectResponse
    {
        $questionIds = $request->session()->get('practice.question_ids');

        if (! $this->isValidSelection($questionIds)) {
            return redirect()->route('practice.index')->with('error', 'ابدأ اختبارًا جديدًا للمتابعة.');
        }

        $questions = $this->orderedQuestions(collect($questionIds)->flatten()->all());

        if (! $this->hasRequiredCategoryCounts($questions)) {
            $request->session()->forget('practice.question_ids');
            $request->session()->forget('practice.deadline');

            return redirect()->route('practice.index')->with('error', 'تغيّر بنك الأسئلة أو تصنيفها. ابدأ اختبارًا جديدًا.');
        }

        return view('practice.show', [
            'questions' => $questions,
            'deadline' => $request->session()->get('practice.deadline'),
            'questionCount' => $questions->count(),
            'questionsPerCategory' => self::QUESTIONS_PER_CATEGORY,
            'durationMinutes' => self::EXAM_DURATION_MINUTES,
        ]);
    }

    public function finish(Request $request): RedirectResponse
    {
        $questionIds = $request->session()->get('practice.question_ids');

        if (! $this->isValidSelection($questionIds)) {
            return redirect()->route('practice.index')->with('error', 'ابدأ اختبارًا جديدًا للمتابعة.');
        }

        $deadline = $request->session()->get('practice.deadline');
        if (! is_int($deadline)) {
            $request->session()->forget(['practice.question_ids', 'practice.deadline']);

            return redirect()->route('practice.index')->with('error', 'انتهت صلاحية الاختبار. ابدأ محاولة جديدة.');
        }

        $timeExpired = now()->timestamp >= $deadline;
        $validated = $request->validate([
            'answers' => [$timeExpired ? 'sometimes' : 'required', 'array'],
            'answers.*' => ['required', 'in:a,b,c,d'],
        ]);

        $answers = $validated['answers'] ?? [];
        $submittedIds = array_map('strval', array_keys($answers));
        $expectedIds = array_map('strval', collect($questionIds)->flatten()->all());
        sort($submittedIds);
        sort($expectedIds);

        $containsOnlyExamQuestions = array_diff($submittedIds, $expectedIds) === [];
        if (! $containsOnlyExamQuestions || (! $timeExpired && $submittedIds !== $expectedIds)) {
            throw ValidationException::withMessages([
                'answers' => $timeExpired
                    ? 'تتضمن الإجابات سؤالًا غير موجود في هذا الاختبار.'
                    : 'أجب عن جميع الأسئلة قبل إرسال الاختبار.',
            ]);
        }

        $questions = $this->orderedQuestions(collect($questionIds)->flatten()->all());
        if (! $this->hasRequiredCategoryCounts($questions)) {
            $request->session()->forget('practice.question_ids');

            return redirect()->route('practice.index')->with('error', 'تغيّر بنك الأسئلة أو تصنيفها. ابدأ اختبارًا جديدًا.');
        }

        $results = $questions->map(function (Question $question) use ($answers): array {
            $selectedOption = $answers[(string) $question->id] ?? $answers[$question->id] ?? null;
            $isCorrect = $selectedOption === $question->correct_option;

            return [
                'question' => [
                    'text' => $question->question,
                    'category' => $question->category,
                    'options' => $question->options,
                    'correct_option' => $question->correct_option,
                    'explanation' => $question->explanation,
                    'image_path' => $question->image_path,
                ],
                'selected_option' => $selectedOption,
                'is_correct' => $isCorrect,
            ];
        });

        $request->session()->put('practice.result', [
            'score' => $results->where('is_correct', true)->count(),
            'question_count' => count(Question::categories()) * self::QUESTIONS_PER_CATEGORY,
            'answers' => $results->all(),
            'time_expired' => $timeExpired,
        ]);
        $request->session()->forget(['practice.question_ids', 'practice.deadline']);

        return redirect()->route('practice.result');
    }

    public function result(Request $request): View|RedirectResponse
    {
        $result = $request->session()->get('practice.result');

        if (! is_array($result)) {
            return redirect()->route('practice.index')->with('error', 'لا توجد نتيجة لعرضها. ابدأ اختبارًا جديدًا.');
        }

        $percentage = (int) round(($result['score'] / $result['question_count']) * 100);
        $grade = match (true) {
            $percentage >= 90 => 'ممتاز',
            $percentage >= 80 => 'جيد جدًا',
            $percentage >= 70 => 'جيد',
            default => 'يحتاج إلى مراجعة',
        };

        return view('practice.result', [
            'result' => $result,
            'categories' => Question::categories(),
            'percentage' => $percentage,
            'grade' => $grade,
        ]);
    }

    /**
     * @param  array<int, int|string>  $questionIds
     * @return Collection<int, Question>
     */
    private function orderedQuestions(array $questionIds): Collection
    {
        $questions = Question::query()
            ->published()
            ->whereKey($questionIds)
            ->get()
            ->keyBy('id');

        return collect($questionIds)
            ->map(fn (int|string $id): ?Question => $questions->get($id))
            ->filter()
            ->values();
    }

    /**
     * @return array<string, int>
     */
    private function publishedCounts(): array
    {
        $counts = Question::published()
            ->selectRaw('category, count(*) as aggregate')
            ->groupBy('category')
            ->pluck('aggregate', 'category')
            ->all();

        return array_replace(array_fill_keys(array_keys(Question::categories()), 0), $counts);
    }

    private function isValidSelection(mixed $selection): bool
    {
        if (! is_array($selection)) {
            return false;
        }

        if (count($selection) !== count(Question::categories()) * self::QUESTIONS_PER_CATEGORY) {
            return false;
        }

        foreach ($selection as $id) {
            if (! is_int($id) && ! is_string($id)) {
                return false;
            }
        }

        return count(array_unique(array_map('strval', $selection))) === count(Question::categories()) * self::QUESTIONS_PER_CATEGORY;
    }

    private function hasRequiredCategoryCounts(Collection $questions): bool
    {
        if ($questions->count() !== count(Question::categories()) * self::QUESTIONS_PER_CATEGORY) {
            return false;
        }

        $counts = $questions->countBy('category');

        foreach (array_keys(Question::categories()) as $category) {
            if ($counts->get($category, 0) !== self::QUESTIONS_PER_CATEGORY) {
                return false;
            }
        }

        return true;
    }
}
