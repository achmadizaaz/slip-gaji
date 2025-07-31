<?php

namespace App\Http\Requests\Roles;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
            'code' => 'min:3|required|string|unique:roles,code,except,id',
            'name' => 'required|string|unique:roles,name,except,id',
            'is_admin' => 'required|in:admin,non-admin',
            'description' => 'nullable|string|max:250'
        ];
    }
}
