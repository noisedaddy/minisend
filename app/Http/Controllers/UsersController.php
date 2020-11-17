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
     * Get paginated users.
     * search - string, search within user first name, last name and email
     * role - integer list eg. role=1,2,4 means show only users who have role Super Admin or Account Admin or Evaluator
     * order - signifies order by column (e.g. order=+name means order by name ascending)
     * account_id
     * page - current paginated page
     * ?page=5&search[name]=john,mike&account_id=4,role=3&order=acs
     */
    public function index()
    {
        $user = auth()->user();
        $url = Request::all();
        $query = $this->usersRepo->getAllowedQueryFor($user);
        $data = $this->usersRepo->filterQuery($url, $query)->paginate();

        return UserResource::collection($data);
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

        return new UserResource($showUser);

    }

    public function store(CreateUser $request)
    {
        $user = auth()->user();
        $data = $request->all();

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

    /**
     * Upload avatar, work in progress
     * Accept data from PUT request in form-data structure, used without binary header part
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function uploadAvatar($id){

        $file = FileUpload::handle();
        if (isset($file['success'])) {
            $user = User::find($id);
            $user->update(['avatar'=>public_path() . '/uploads/'.$file['success']]);
            return $this->dataResponse($file['success']);
        } else{
            return $this->errorResponse($file['error']);
        }

    }

    /**
     * Search
     * @param Request $request
     * @return array
     */
    public function search(Search $request){
        return $this->usersRepo->search($request->toArray());
    }

}
