<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
class OrganizationUser extends Pivot
{
    protected $fillable = [
        'organization_id',
        'user_id',
        'role_id',
    ];

    protected $with = [
        'role',
    ];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
