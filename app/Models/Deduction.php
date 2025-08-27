<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deduction extends Model
{
     protected $fillable = ['nama','default_amount','is_active'];
}
