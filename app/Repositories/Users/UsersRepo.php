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
        return User::where('id', $id)->first();
    }

    public function create($data) {
        return User::create($data);
    }

    public function update(array $data, $id){

    }

    public function delete($id){

    }

    public function show($id){

    }

}
