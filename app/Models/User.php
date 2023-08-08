<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Events\UserCreated;
use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasTenants;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Collection;
use Filament\Panel;


class User extends Authenticatable implements FilamentUser, HasTenants
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
        'city',
        'state',
        'zip',
        'country',
    ];

    /**
     * The event map for the model.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'created' => UserCreated::class,
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function notification_settings()
    {
        return $this->hasOne(UserNotificationSetting::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function organizations()
    {
        return $this->belongsToMany(Organization::class)->using(OrganizationUser::class)->withPivot('role_id');
    }

    public function getTenants(Panel $panel): Collection
    {
        return $this->organizations;
    }

    public function canAccessPanel(Panel $panel): bool
    {
        $roles = $this->roles;
        if($roles->contains('slug', 'global-administrator')){return true;}
        return false;
        /*if($panel->getId() === 'app'){
            $Organizations = $this->organizations;
            foreach($Organizations as $Organization){
                if($Organization->pivot->role->id <= 4){
                    return true;
                }
            }
            return false;
        }else{
            return false;
        }*/
    }

    public function canAccessTenant(Model $tenant): bool
    {
        $roles = $this->roles;
        if($roles->contains('slug', 'global-administrator')){return true;}
        return $tenant->users->contains('id',$this->id);
    }
}
