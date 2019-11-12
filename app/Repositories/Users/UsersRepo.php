<?php

namespace App\Repositories\Users;

use App\Models\User;

class UsersRepo {
    public function find($id)
    {
        return User::where('id', $id)->first();
    }
}
