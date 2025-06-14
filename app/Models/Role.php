<?php

namespace App\Models;

use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    protected $fillable = [
        'name',
        'guard_name',
        'level',
        'description'
    ];

    // SCOPE FILTER
    public function scopeFilter($query, array $filters){
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->whereAny(['name', 'level', 'description',], 
                'like', '%' . $search . '%');
        });
    }
}
