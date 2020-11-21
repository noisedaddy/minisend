<?php

namespace App\Repositories\Users;

use App\Models\Email;
use App\Models\User;
use App\Support\Enums\UserRole;
use Illuminate\Support\Facades\DB;
use Spatie\QueryBuilder\QueryBuilder;
use App\Repositories\Traits\FilterableTrait;

class UsersRepo implements UsersInterface {

    /**
     * Find user by id
     * @param $id
     * @return \Illuminate\Database\Eloquent\Model|object|QueryBuilder|null
     */
    public function find($id)
    {
        return User::where('id', $id)->first();
    }


    public function show($id){

    }


}
