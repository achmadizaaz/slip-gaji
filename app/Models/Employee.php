<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Employee extends Model
{

    use Sluggable;

   protected $fillable = [
        'nip',
        'nama',
        'slug',
        'email',
        'tanggal_masuk',
        'status_kepegawaian',
        'gaji_pokok',
        'is_active',
    ];

     /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama'
            ]
        ];
    }

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
