<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AskQuestionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'email.required' => 'Необходимо ввести электронную почту',
            'email.email' => 'Некорректный формат электроной почты',

            'name.required' => 'Необходимо ввести имя',
            'name.max' => 'Имя не может быть больше :max символов',

            'question.required' => 'Необходимо ввести вопрос',
            'question.min' => 'Вопрос не может быть меньше :min символов',
            'question.max' => 'Вопрос не может быть больше :max символов',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'name' => 'required|string|max:256',
            'question' => 'required|string|min:16|max:2048',
        ];
    }
}