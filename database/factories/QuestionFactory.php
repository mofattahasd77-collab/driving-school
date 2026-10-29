<?php

namespace Database\Factories;

use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Question>
 */
class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'question' => fake()->sentence().'؟',
            'options' => [
                'a' => fake()->sentence(),
                'b' => fake()->sentence(),
                'c' => fake()->sentence(),
                'd' => fake()->sentence(),
            ],
            'correct_option' => fake()->randomElement(['a', 'b', 'c', 'd']),
            'explanation' => fake()->optional()->sentence(),
            'image_path' => null,
            'is_published' => false,
        ];
    }

    public function published(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_published' => true,
        ]);
    }
}
