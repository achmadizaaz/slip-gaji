<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeDeduction extends Model
{
    protected $fillable = ['employee_id','deduction_id','amount'];

    public function employee() { return $this->belongsTo(Employee::class); }
    public function deduction() { return $this->belongsTo(Deduction::class); }
}
