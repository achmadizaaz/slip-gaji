<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
   protected $fillable = [
        'nip',
        'nama',
        'jabatan',
        'unit_kerja',
        'email',
        'no_hp',
        'tanggal_masuk',
        'status_kepegawaian',
        'gaji_pokok',
    ];

    public function allowances()
    {
        return $this->belongsToMany(Allowance::class, 'employee_allowances')->withPivot('amount');
    }

    public function deductions()
    {
        return $this->belongsToMany(Deduction::class, 'employee_deductions')->withPivot('amount');
    }

    public function salarySlips()
    {
        return $this->hasMany(SalarySlip::class);
    }
}
