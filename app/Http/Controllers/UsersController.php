<?php

namespace App\Http\Controllers;

use App\Repositories\Users\UsersRepo;
use App\Http\Resources\User as UserResource;

class UsersController extends Controller
{
    protected $usersRepo;

    public function __construct(UsersRepo $usersRepo)
    {
        $this->usersRepo = $usersRepo;
    }

    public function read($id)
    {
        if ($id === "me") {
            return new UserResource(auth()->user());
        } else {
            // check if allowed to access user with this id

            return new UserResource($this->usersRepo->find($id));
        }
    }
}
