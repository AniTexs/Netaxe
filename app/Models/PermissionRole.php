<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermissionRole extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'permission_id',
        'role_id',
    ];

    /**
     * Get the permission that owns the PermissionRole.
     */
    public function permission()
    {
        return $this->belongsTo(Permission::class);
    }

    /**
     * Get the role that owns the PermissionRole.
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
