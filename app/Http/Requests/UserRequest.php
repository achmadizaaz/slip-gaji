<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'image' => ['nullable', 'image', 'mimes:png,jpg,jpeg', 'max:2048'],
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'unique:users,username,id', 'min:4','max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,except,id'],
            'password' => ['required', 'string', 'min:8', 'max:255'],
            'is_active' => ['required', 'in:active,inactive'],
            'role' => ['nullable', 'exists:roles,id'],
        ];
    }

    public function messages()
    {
        return [
            'is_active.in' => 'The status must contain "active" or "inactive"'
        ];
    }
}
