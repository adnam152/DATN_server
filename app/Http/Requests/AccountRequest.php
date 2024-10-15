<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountRequest extends FormRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email|unique:accounts,email|max:255', 
            'phone_number' => 'required|string|max:20|unique:accounts,phone_number', 
            'full_name' => 'required|string|max:255', 
            'password' => 'required|string|min:8', 
            'address' => 'nullable|string|max:255', 
            'dob' => 'nullable|date', 
            'avatar' => 'nullable|url', 
            'role_id' => 'required|exists:roles,id', 
        ];
    }
}