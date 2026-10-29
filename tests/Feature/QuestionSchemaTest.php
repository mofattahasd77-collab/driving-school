<?php

namespace Tests\Feature;

use App\Models\Question;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class QuestionSchemaTest extends TestCase
{
    use RefreshDatabase;

    public function test_question_bank_stores_options_answers_explanations_and_optional_images(): void
    {
        $question = Question::create([
            'question' => 'ماذا تعني الإشارة الحمراء؟',
            'options' => [
                'a' => 'توقف',
                'b' => 'تابع السير',
                'c' => 'خفف السرعة',
                'd' => 'غيّر المسار',
            ],
            'correct_option' => 'a',
            'explanation' => 'يجب التوقف عند الإشارة الحمراء.',
            'image_path' => 'questions/traffic-light.webp',
            'is_published' => true,
        ]);

        $storedQuestion = $question->fresh();

        $this->assertModelExists($storedQuestion);
        $this->assertSame(Question::CATEGORY_THEORY, $storedQuestion->category);
        $this->assertSame('a', $storedQuestion->correct_option);
        $this->assertSame('questions/traffic-light.webp', $storedQuestion->image_path);
        $this->assertSame('توقف', $storedQuestion->options['a']);
        $this->assertSame('يجب التوقف عند الإشارة الحمراء.', $storedQuestion->explanation);
        $this->assertTrue($storedQuestion->is_published);
    }
}
