<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [     
            'phone_number' => 'required|string|max:20', 
            'password' => 'required|string|min:6', 
        ];
    }
    public function messages(): array
    {
        return [
            'phone_number.required' => 'Số điện thoại không được để trống',
            'phone_number.string' => 'Số điện thoại phải là kiểu chuổi',
            'phone_number.max' => 'Số điện thoại không được vượt quá 20 kí tự',
            'password.required' => 'Mật khẩu không được để trống',
            'password.string' => 'Mật khẩu phải là kiểu chuổi',
            'password.min' => 'Mật khẩu phải có ít nhất 6 kí tự',
        ];
    }
}