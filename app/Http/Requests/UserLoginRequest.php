<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserLoginRequest extends FormRequest
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
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6'
        ];
    }

    public function messages(){
        return [
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không đúng dịnh dạng',
            'email.exists' => 'Email chưa được đăng ký',
            'password.required' => 'Password không được để trống',
            'password.min' => 'Password ít nhất 6 ký tự'
        ];
    }
}
