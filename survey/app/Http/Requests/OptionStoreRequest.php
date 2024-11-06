<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OptionStoreRequest extends FormRequest
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
            'survey_id' => 'required|integer',
            'user_id' => 'required|integer',
            'option' => 'required|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'survey_id.required' => 'Choose a survey',
            'user_id.required' => 'Choose a user',
            'option.required' => 'Option is required',
            'option.string' => 'Option must be a string',
            'option.max' => 'Option must not be greater than 255 characters',
        ];
    }
}
