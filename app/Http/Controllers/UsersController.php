<?php

namespace App\Http\Controllers;

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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return UserResource::collection(\App\Models\User::all());
    }

    public function show($id)
    {
        if ($id === "me") {
            return new UserResource(auth()->guard('api')->user());
        } else {
            // check if allowed to access user with this id

            return new UserResource($this->usersRepo->find($id));
        }
    }


    public function store(\Request $request){

        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
//            'image' => 'required|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $user = new \App\Models\User();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = str_slug($request->title) . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/user_media');
            $imagePath = $destinationPath . "/" . $name;
            $image->move($destinationPath, $name);
            $user->avatar = $name;
        }

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->avatar = $request->avatar;
        $user->save();

        return new UserResource($user);

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
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
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */

    public function delete(\App\Models\User $user)
    {
        $user->delete();
        return response()->json(null, 204);
    }

}
