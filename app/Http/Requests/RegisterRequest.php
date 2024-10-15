<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'email' => 'nullable|email|unique:accounts,email|max:255', 
            'phone_number' => 'required|string|max:20|unique:accounts,phone_number', 
            'full_name' => 'required|string|max:255', 
            'password' => 'required|string|min:6|confirmed', 
            'address' => 'nullable|string|max:255', 
            'dob' => 'nullable|date', 
            'avatar' => 'nullable|url', 
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'email.email' => 'Email không hợp lệ.',
            'email.unique' => 'Email đã tồn tại.',
            'phone_number.required' => 'Số điện thoại là bắt buộc.',
            'phone_number.unique' => 'Số điện thoại đã tồn tại.',
            'full_name.required' => 'Tên đầy đủ là bắt buộc.',
            'password.required' => 'Mật khẩu là bắt buộc.',
            'password.min' => 'Mật khẩu phải có ít nhất :min ký tự.',
            'password.confirmed' => 'Mật khẩu xác nhận không khớp.',  
        ];
    }
}
