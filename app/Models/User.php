<?php

namespace App\Models;

use App\Support\Enums\UserRole;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'account_id',
        'email',
        'first_name',
        'last_name',
        'password',
        'role',
        'phone_number',
        'address',
        'position',
        'email_notifications',
        'last_login',
        'first_login',
        'timezone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'last_login' => 'datetime',
        'first_login' => 'datetime',
    ];
    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function isSuperAdmin() {
        return $this->role === UserRole::SUPER_ADMIN;
    }

    public function isCompanyAdmin() {
        return $this->role === UserRole::COMPANY_ADMIN;
    }

    public function isCompanyManager() {
        return $this->role === UserRole::COMPANY_MANAGER;
    }

    public function isEvaluator() {
        return $this->role === UserRole::EVALUATOR;
    }
}
