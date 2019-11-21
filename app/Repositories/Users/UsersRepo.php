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
        $q = User::query();

        if ($user->isAccountAdmin()) {
            $q->where('account_id', $user->account_id);
            $q->whereIn('role', [UserRole::ACCOUNT_ADMIN, UserRole::ACCOUNT_MANAGER]);
        }

        return $q;
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
