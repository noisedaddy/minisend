<?php

namespace App\Http\Controllers;

use App\Repositories\Users\UsersRepo;

class UsersController extends Controller
{
    protected $usersRepo;

    public function __construct(UsersRepo $usersRepo)
    {
        $this->usersRepo = $usersRepo;
    }
}
