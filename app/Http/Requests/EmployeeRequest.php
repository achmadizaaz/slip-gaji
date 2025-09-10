<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EmployeeRequest extends FormRequest
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
            'nip' => ['required', Rule::unique('employees', 'nip')->ignore($this->id, 'slug'),],
            'nama' => 'string|required',
            'status_kepegawaian' => 'in:Tetap,Kontrak,Honorer',
            'email' =>  ['required', 'email',Rule::unique('employees', 'email')->ignore($this->id, 'slug'),],
            'gaji_pokok' => 'required',
            'is_active' => 'required|boolean'
        ];
    }
}
