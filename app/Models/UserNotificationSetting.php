<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserNotificationSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'email_general',
        'email_advertisement',
        'email_upcoming',
        'phone_general',
        'phone_advertisement',
        'phone_upcoming',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
