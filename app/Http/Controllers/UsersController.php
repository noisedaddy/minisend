<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\Search;
use App\Http\Requests\Users\UpdateUser;
use App\Http\Requests\Users\CreateUser;
use App\Models\User;
use App\Repositories\Users\UsersRepo;
use App\Http\Resources\User as UserResource;
use Illuminate\Support\Facades\Request;

use App\Services\File\FileUpload;

class UsersController extends Controller
{
    protected $usersRepo;

    public function __construct(UsersRepo $usersRepo)
    {
        $this->usersRepo = $usersRepo;
    }

    /**
     * Show curren logged in user
     * @param $id
     * @return UserResource|\Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $currentUser = auth()->user();

        if ($id === "me") {
            return new UserResource($currentUser);
        }

        $showUser = $this->usersRepo->find($id);

        if (!$showUser) {
            return $this->notFound();
        }

        return new UserResource($showUser);

    }

}
