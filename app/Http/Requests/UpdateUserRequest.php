<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'country_code' => 'required|string|max:5',
            'user_type_id' => 'required|integer|exists:user_types,id', // Ensure this is correct
            'isAdmin' => 'boolean',
            'isActive' => 'boolean',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'The first name is required.',
            'last_name.required' => 'The last name is required.',
            'country_code.required' => 'The country code is required.',
            'email.required' => 'The email is required.',
            'user_type_id.required' => 'The user type is required.',
            'isAdmin.boolean' => 'The is admin field must be true or false.',
            'isActive.boolean' => 'The status field must be true or false.',
        ];
    }
}
