<?php

namespace App\Http\Requests\user\login;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'email'=> 'required|string|email|unique:users',
            'password'=> 'required|string',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => "Это поле необходимо для заполнения!",
            'email.required' => "Это поле необходимо для заполнения!",
            'email.string' => "Это поле должно быть строковым типом!",
            'email.email' => "Почта должна соответствовать типу mail@some.domain",
            'email.unique' => "Пользователь с таким email уже существует",
            'password.required' => "Это поле необходимо для заполнения!",
            'password.string' => "Это поле должно быть строковым типом!",
        ];
    }
}
