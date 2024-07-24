<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'isAdmin' => $this->boolean('isAdmin'),
            'isActive' => $this->boolean('isActive'),
        ]);
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
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'country_code' => 'required|string|max:3',
            'user_type_id' => 'required|exists:user_types,id',
            'isAdmin' => 'boolean',
            'isActive' => 'boolean',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'The first name is required.',
            'last_name.required' => 'The last name is required.',
            'email.required' => 'The email is required.',
            'password.required' => 'The password is required.',
            'country_code.required' => 'The country_code is required.',
            'user_type_id.required' => 'The user type is required.',
            'isAdmin.boolean' => 'The is admin field must be true or false.',
            'isActive.boolean' => 'The status field must be true or false.',
            'avatar.image' => 'The avatar must be an image.',
            'avatar.mimes' => 'The avatar must be a file of type: jpeg, png, jpg.',
            'avatar.max' => 'The avatar may not be greater than 2MB.',
        ];
    }
}
