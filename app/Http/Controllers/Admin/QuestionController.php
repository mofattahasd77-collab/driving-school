<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use App\Models\Question;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use RuntimeException;

class QuestionController extends Controller
{
    public function index(): View
    {
        return view('admin.questions.index', [
            'questions' => Question::query()->latest()->paginate(20),
            'totalQuestions' => Question::query()->count(),
            'publishedCounts' => Question::published()
                ->selectRaw('category, count(*) as aggregate')
                ->groupBy('category')
                ->pluck('aggregate', 'category')
                ->all(),
            'categories' => Question::categories(),
        ]);
    }

    public function create(): View
    {
        return view('admin.questions.create', [
            'question' => new Question,
            'categories' => Question::categories(),
        ]);
    }

    public function store(StoreQuestionRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $imagePath = isset($data['image'])
            ? $this->storeImage($request)
            : null;

        Question::create($this->questionAttributes($data) + ['image_path' => $imagePath]);

        return redirect()->route('admin.questions.index')->with('status', 'تمت إضافة السؤال بنجاح.');
    }

    public function edit(Question $question): View
    {
        return view('admin.questions.edit', [
            'question' => $question,
            'categories' => Question::categories(),
        ]);
    }

    public function update(UpdateQuestionRequest $request, Question $question): RedirectResponse
    {
        $data = $request->validated();
        $previousImage = $question->image_path;
        $newImage = isset($data['image']) ? $this->storeImage($request) : null;

        $question->update($this->questionAttributes($data) + [
            'image_path' => $newImage ?? ($request->boolean('remove_image') ? null : $previousImage),
        ]);

        if ($newImage !== null || $request->boolean('remove_image')) {
            $this->deleteImage($previousImage);
        }

        return redirect()->route('admin.questions.index')->with('status', 'تم تحديث السؤال بنجاح.');
    }

    public function destroy(Question $question): RedirectResponse
    {
        $imagePath = $question->image_path;
        $question->delete();
        $this->deleteImage($imagePath);

        return redirect()->route('admin.questions.index')->with('status', 'تم حذف السؤال.');
    }

    private function questionAttributes(array $data): array
    {
        return [
            'question' => $data['question'],
            'category' => $data['category'],
            'options' => [
                'a' => $data['option_a'],
                'b' => $data['option_b'],
                'c' => $data['option_c'],
                'd' => $data['option_d'],
            ],
            'correct_option' => $data['correct_option'],
            'explanation' => $data['explanation'] ?? null,
            'is_published' => (bool) $data['is_published'],
        ];
    }

    private function storeImage(StoreQuestionRequest|UpdateQuestionRequest $request): string
    {
        $path = $request->file('image')->storePublicly('questions', 'question_images');

        if ($path === false) {
            throw new RuntimeException('Unable to store the question image.');
        }

        return $path;
    }

    private function deleteImage(?string $path): void
    {
        $disk = Storage::disk('question_images');

        if ($path !== null && $disk->exists($path) && ! $disk->delete($path)) {
            throw new RuntimeException('Unable to delete the question image.');
        }
    }
}
