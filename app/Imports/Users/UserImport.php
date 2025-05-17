<?php

namespace App\Imports\Users;

use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class UserImport implements ToCollection, WithHeadingRow, WithValidation
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        $users = [];
        foreach ($collection as $collect) 
        {
            $users[] = [
                'id' => strtolower(Str::ulid()),
                'name' => $collect['name'],
                'username' => $collect['username'],
                'slug' => Str::slug($collect['username']),
                'email'=> $collect['email'],
                'password' => Hash::make($collect['password']),
                'is_active' => $collect['is_active'],
            ];
        }

        User::insert($users);
    }
    
    public function rules(): array
    {
        return [
            '*.name'    => 'required|string',
            '*.username'=> 'required|unique:users,username',
            '*.email'   => 'required|email|unique:users,email',
            '*.password'=> 'required|min:5',
            '*.is_active'=> 'required|boolean|min:0|max:1',
        ];
    }
}
