<?php

namespace App\Repositories\Emails;

interface EmailsInterface
{

    public function find($id);

    public function create(array $data);

    public function update(array $data, $id);

    public function delete($id);

    public function show($id);

    public function search(array $data);
}
