<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{

    use HasUlids;

    protected $fillable = [
        'name',
        'guard_name',
        'code',
        'is_admin',
        'description'
    ];

    // SCOPE FILTER
    public function scopeFilter($query, array $filters){
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->whereAny(['name', 'level', 'is_admin', 'description',], 
                'like', '%' . $search . '%');
        });
    }
}
