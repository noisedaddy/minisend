<?php

namespace App\Repositories\Users;

use App\Models\User;
use App\Support\Enums\UserRole;
use Spatie\QueryBuilder\QueryBuilder;


class UsersRepo implements UsersInterface {

    /**
     * Get all users
     * @return \Illuminate\Database\Eloquent\Collection|QueryBuilder|QueryBuilder[]
     */
    public function all(){
        return QueryBuilder::for(User::class)->get();
    }

    /**
     * Find user by id
     * @param $id
     * @return \Illuminate\Database\Eloquent\Model|object|QueryBuilder|null
     */
    public function find($id)
    {
        return QueryBuilder::for(User::class)->where('id', $id)->first();
    }

    /**
     * Add new user
     * @param array $data
     * @return mixed
     */
    public function create($data) {
        $data['role'] = $data['role'] ?? UserRole::EVALUATOR;
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
