<?php

namespace App\Http\Requests\personal\Comment;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'message'=> 'required|string'
        ];
    }
    public function messages()
    {
        return [
            'message.required' => "Это поле необходимо для заполнения!",
            'message.string' => "Данные должны соответствовать строчному типу!",
        ];
    }
}
