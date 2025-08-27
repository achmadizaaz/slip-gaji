<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'nis' => 'nullable|unique:employees,nis',
            'nama' => 'string|required',
            'status_kepegawaian' => 'in:Tetap,Kontrak,Honorer',
            'email' => 'email|required|unique:employees,email',
            'gaji_pokok' => 'required'
        ];
    }
}
