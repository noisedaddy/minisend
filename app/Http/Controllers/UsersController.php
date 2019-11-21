<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\UpdateUser;
use App\Http\Requests\Users\CreateUser;
use App\Http\Resources\User;
use App\Repositories\Users\UsersRepo;
use App\Http\Resources\User as UserResource;
use Illuminate\Support\Facades\Request;

class UsersController extends Controller
{
    protected $usersRepo;

    public function __construct(UsersRepo $usersRepo)
    {
        $this->usersRepo = $usersRepo;
    }

    public function index()
    {
        return UserResource::collection($this->usersRepo->all());
    }

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

        if ($currentUser->can('view', $showUser)) {
            return new UserResource($showUser);
        } else {
            return $this->forbidden();
        }
    }

    public function store(CreateUser $request)
    {
        $user = auth()->user();
        $data = $request->all();

        if (!$user->can('create')) {
            return $this->forbidden();
        }

        if ($user->isAccountAdmin()) {
            $data['account_id'] = $user['account_id'];
        }

        $newUser = $this->usersRepo->create($data);

        return new UserResource($newUser);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Request $request
     * @param \App\Models\User $user
     * @return UserResource
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(UpdateUser $request, \App\Models\User $user)
    {
        $this->usersRepo->update($request->toArray(), $user);
        return new UserResource($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */

    public function destroy(\App\Models\User $user)
    {
        $this->usersRepo->delete($user);
        return response()->json(null, 204);
    }

}
