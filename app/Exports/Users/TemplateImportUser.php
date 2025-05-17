<?php

namespace App\Exports\Users;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class TemplateImportUser implements FromCollection, WithHeadings, WithTitle
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data = collect([
            [
                'name' => 'Nama Lengkap',
                'username' => 'namapengguna',
                'email' => 'email@pengguna.com',
                'is_active' => '1 (aktif), 0 (non aktif)',
                'password' => 'katasandi',
            ],
        ]);
        return $data;
    }

    public function headings(): array
    {
        return [
            'name', 'username','email','is_active', 'password',
        ];
    }

    public function title(): string
    {
        return 'Template Import User';
    }
}
