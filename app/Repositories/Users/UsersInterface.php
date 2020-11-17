<?php

namespace App\Repositories\Users;

interface UsersInterface
{

    public function find($id);

    public function create(array $data);

    public function update(array $data, $id);

    public function delete($id);

    public function show($id);

    public function search(array $data);
}
