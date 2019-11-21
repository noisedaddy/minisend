<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';

    protected $fillable = [
        'account_id',
        'name',
        'logo',
        'phone_number',
        'address',
        'website',
        'facebook',
        'twitter',
        'google_plus',
        'linkedin',
        'instagram',
        'meta',
    ];

    public function account()
    {
        return $this->belongsTo(Account::class, 'account_id', 'id');
    }

    public function divisons() {
        return $this->hasMany(Division::class, 'company_id', 'id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_company', 'user_id', 'company_id');
    }
}
