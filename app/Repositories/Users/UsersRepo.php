<?php

namespace App\Repositories\Users;

use App\Models\User;
use App\Support\Enums\UserRole;
use Spatie\QueryBuilder\QueryBuilder;
use App\Repositories\Traits\FilterableTrait;

class UsersRepo implements UsersInterface {

    use FilterableTrait;

    public function getAllowedQueryFor(User $user)
    {
        return User::query();
    }

    /**
     * Find user by id
     * @param $id
     * @return \Illuminate\Database\Eloquent\Model|object|QueryBuilder|null
     */
    public function find($id)
    {
        return User::where('id', $id)->first();
    }

    /**
     * Add new user
     * @param array $data
     * @return mixed
     */
    public function create($data) {
        return User::create($data);
    }

    /**
     * Update user
     * @param array $data
     * @param $user
     * @return mixed
     */
    public function update(array $data, $user){
        return $user->update($data);
    }

    /**
     * Delete user
     * @param $user
     * @return mixed
     */
    public function delete($user){
        return $user->delete();
    }

    public function show($id){

    }

}
