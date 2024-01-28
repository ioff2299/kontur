<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'phone' => 'required|integer',
            'email' => 'required|email|max:255',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Поле "Имя" обязательно для заполнения.',
            'name.string' => 'Имя должно быть строкой.',
            'name.max' => 'Имя не может превышать :max символов.',
            'phone.required' => 'Поле "Телефон" обязательно для заполнения.',
            'phone.integer' => 'Телефон должен быть целым числом.',
            'email.required' => 'Поле "Email" обязательно для заполнения.',
            'email.email' => 'Пожалуйста, введите корректный адрес электронной почты.',
            'email.max' => 'Email не может превышать :max символов.',
        ];
    }
}
