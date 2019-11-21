<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = [
        'name',
        'billing_options',
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'account_id', 'id');
    }

    public function companies()
    {
        return $this->hasMany(Company::class, 'account_id', 'id');
    }
}
