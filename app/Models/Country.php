<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'cca2',
        'ccn3',
        'cca3',
        'cioc',
        'name',
    ];

    public function organizations()
    {
        return $this->hasMany(Organization::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
