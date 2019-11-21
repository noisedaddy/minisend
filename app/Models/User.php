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
        'role',
        'first_name',
        'last_name',
        'full_name',
        'email',
        'password',
        'phone_number',
        'address',
        'avatar',
        'position',
        'email_notifications',
        'last_login',
        'first_login',
        'timezone',
        'meta',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'meta'
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

    public function account()
    {
        return $this->belongsTo(Account::class, 'account_id', 'id');
    }

    public function companies()
    {
        return $this->belongsToMany(Company::class, 'user_company', 'company_id', 'user_id');
    }

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

    public function isSuperAdmin()
    {
        return $this->role === UserRole::SUPER_ADMIN;
    }

    public function isAccountAdmin()
    {
        return $this->role === UserRole::ACCOUNT_ADMIN;
    }

    public function isAccountManager()
    {
        return $this->role === UserRole::ACCOUNT_MANAGER;
    }

    public function isEvaluator()
    {
        return $this->role === UserRole::EVALUATOR;
    }
}
