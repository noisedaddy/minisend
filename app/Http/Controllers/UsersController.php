<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\CreateUser;
use App\Http\Resources\User;
use App\Repositories\Users\UsersRepo;
use App\Http\Resources\User as UserResource;

class UsersController extends Controller
{
    protected $usersRepo;

    public function __construct(UsersRepo $usersRepo)
    {
        $this->usersRepo = $usersRepo;
    }

    public function index() {
        return UserResource::collection(\App\Models\User::all());
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

        if ($user->isCompanyAdmin()) {
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
    public function update(\Request $request, \App\Models\User $user)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
        ]);

        $user->update($request->only(['first_name', 'last_name', 'email']));
        return new UserResource($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */

    public function delete(\App\Models\User $user)
    {
        $user->delete();
        return response()->json(null, 204);
    }

}
