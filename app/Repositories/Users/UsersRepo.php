<?php

namespace App\Repositories\Users;

use App\Models\User;
use App\Support\Enums\UserRole;
use Spatie\QueryBuilder\QueryBuilder;
use App\Repositories\Traits\FilterableTrait;

class UsersRepo implements UsersInterface {

    use FilterableTrait;

    /**
     * Get all users.
     * search - string, search within user first name, last name and email
     * role - integer list eg. role=1,2,4 means show only users who have role Super Admin or Account Admin or Evaluator
     * order - signifies order by column (e.g. order=+name means order by name ascending)
     * account_id
     * page - current paginated page
     * ?page=5&search[name]=john,mike&account_id=4,role=3&order=acs
     *
     * @return \Illuminate\Database\Eloquent\Collection|QueryBuilder|QueryBuilder[]
     */
    public function all(array $url = []){

        $query = QueryBuilder::for(User::class);
        return $this->filterQuery($url, $query);

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
