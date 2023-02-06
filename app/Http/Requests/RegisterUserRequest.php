<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'username' => 'required|string|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'location' => 'nullable|string',
            'skills' => 'nullable|string',
            'profile_picture' => 'nullable|url',
            'github_url' => 'nullable|url',
            'bio' => 'nullable|string',
            'portfolio' => 'nullable|string',
            'interests' => 'nullable|string',
            'current_position' => 'nullable|string'
        ];
    }
}
