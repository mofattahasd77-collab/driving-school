<?php

namespace App\Http\Requests;

use App\Models\Question;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateQuestionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->can('manage-questions') ?? false;
    }

    public function rules(): array
    {
        return [
            'question' => ['required', 'string', 'max:5000'],
            'category' => ['required', 'string', Rule::in(array_keys(Question::categories()))],
            'option_a' => ['required', 'string', 'max:1000'],
            'option_b' => ['required', 'string', 'max:1000'],
            'option_c' => ['required', 'string', 'max:1000'],
            'option_d' => ['required', 'string', 'max:1000'],
            'correct_option' => ['required', 'in:a,b,c,d'],
            'explanation' => ['nullable', 'string', 'max:5000'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,webp', 'max:5120'],
            'is_published' => ['required', 'boolean'],
            'remove_image' => ['sometimes', 'boolean'],
        ];
    }
}
