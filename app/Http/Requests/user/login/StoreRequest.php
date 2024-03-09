<?php

namespace App\Http\Requests\user\login;

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
            'email'=> 'required|string|email|exists:users',
            'password'=> 'required|string',
        ];
    }
    public function messages()
    {
        return [
            'email.required' => "Это поле необходимо для заполнения!",
            'email.string' => "Это поле должно быть строковым типом!",
            'email.email' => "Почта должна соответствовать типу mail@some.domain",
            'email.exists' => "Неверный логин",
            'password.required' => "Это поле необходимо для заполнения!",
            'password.string' => "Это поле должно быть строковым типом!",
        ];
    }
}
