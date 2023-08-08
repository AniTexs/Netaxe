<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class RoleUser extends Pivot
{
    protected $fillable = [
        'role_id',
        'user_id',
    ];

    /**
     * Get the role that owns the RoleUserD.
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Get the user that owns the RoleUserD.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
