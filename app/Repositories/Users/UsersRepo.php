<?php

namespace App\Repositories\Users;

use App\Models\User;
use App\Support\Enums\UserRole;
use Illuminate\Support\Facades\DB;
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

    public function search(array $data)
    {
        $search = $data['search_phrase'];
        $searchOptions = $data['values']['role'];

        if (is_array($searchOptions) && !empty($searchOptions))
            dd($searchOptions);
        else
            dd('empty');

        return User::where('first_name', 'LIKE', '%' . $search . '%')->orWhere('last_name', 'LIKE', '%' . $search . '%')->orWhere('email', 'LIKE', '%' . $search . '%')->get();
    }

}
