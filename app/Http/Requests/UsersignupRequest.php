<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersignupRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'username' => 'required|string|max:20|unique:users',
            'full_name' => 'required|string|max:30',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|unique:users',
            'phone_number' => 'required|max:11|unique:users|min:11',
        ];
    }
}
