<?php

namespace Tests\Feature;

use App\Models\Question;
use Database\Seeders\QuestionSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class QuestionSeederTest extends TestCase
{
    use RefreshDatabase;

    public function test_question_seeder_adds_fifteen_published_questions_per_category_and_is_safe_to_rerun(): void
    {
        $this->seed(QuestionSeeder::class);
        $this->seed(QuestionSeeder::class);

        $this->assertDatabaseCount('questions', 45);

        foreach (Question::categories() as $category => $label) {
            $this->assertSame(
                15,
                Question::published()->where('category', $category)->count(),
                "Expected 15 published {$label} questions."
            );
        }

        foreach (Question::query()->get() as $question) {
            $this->assertSame(['a', 'b', 'c', 'd'], array_keys($question->options));
            $this->assertArrayHasKey($question->correct_option, $question->options);
        }
    }
}
