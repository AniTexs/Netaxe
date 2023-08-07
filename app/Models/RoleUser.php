<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'role_id',
        'user_id',
    ];

    /**
     * Get the role that owns the RoleUser.
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Get the user that owns the RoleUser.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
