<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SurveyUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'category_id' => 'required|integer',
            'question' => 'required|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'category_id.required' => 'Choose a category',
            'question.required' => 'Question is required',
            'question.string' => 'Question must be a string',
            'question.max' => 'Question must not be greater than 255 characters',
        ];
    }
}
