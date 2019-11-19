<?php

namespace App\Repositories\Users;

use App\Models\User;
use Spatie\QueryBuilder\QueryBuilder;


class UsersRepo implements UsersInterface {

    public function all(){
        return QueryBuilder::for(User::class)->get();
    }

    public function find($id)
    {
        return QueryBuilder::for(User::class)->where('id', $id)->first();
    }

    public function create($data) {
        $data['role'] = $data['role'] ?? 1;
        return User::create($data);
    }

    public function update(array $data, $id){

    }

    public function delete($id){

    }

    public function show($id){

    }

}
