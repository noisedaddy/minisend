<?php

namespace App\Http\Controllers;

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

        if (!$user->can('viewAny', User::class)) {
            return $this->forbidden();
        }

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

    /**
     * Upload avatar, work in progress
     * Accept data from PUT request in form-data structure, used without binary header part
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function uploadAvatar($id){

        //binary image upload
//        $imageData = base64_encode(file_get_contents('php://input', 'r'));
//        $size = file_put_contents(public_path() . '/uploads/'.$id.'-'.time().'.jpg', base64_decode($imageData));
//        dd($imageData);

        $raw_data = file_get_contents('php://input');
        $boundary = substr($raw_data, 0, strpos($raw_data, "\r\n"));

        // Fetch each part
        $parts = array_slice(explode($boundary, $raw_data), 1);
        $data = array();

        foreach ($parts as $part) {
            // If this is the last part, break
            if ($part == "--\r\n") break;

            // Separate content from headers
            $part = ltrim($part, "\r\n");
            list($raw_headers, $body) = explode("\r\n\r\n", $part, 2);

            // Parse the headers list
            $raw_headers = explode("\r\n", $raw_headers);
            $headers = array();
            foreach ($raw_headers as $header) {
                list($name, $value) = explode(':', $header);
                $headers[strtolower($name)] = ltrim($value, ' ');
            }

            // Parse the Content-Disposition to get the field name, etc.
            if (isset($headers['content-disposition'])) {
                $filename = null;
                preg_match(
                    '/^(.+); *name="([^"]+)"(; *filename="([^"]+)")?/',
                    $headers['content-disposition'],
                    $matches
                );
                list(, $type, $name) = $matches;
                isset($matches[4]) and $filename = $matches[4];

                // handle your fields here
                switch ($name) {
                    // this is a file upload
                    case 'file':
                        file_put_contents(public_path() . '/uploads/'.$filename, $body);
                        break;

                    // default for all other files is to populate $data
                    default:
                        $data[$name] = substr($body, 0, strlen($body) - 2);
                        break;
                }
            }

        }

        //get the image type
//        $put = array();
//        parse_str(file_get_contents('php://input'), $put);
//        dd($put);

//        $putdata = fopen("php://input", "r");
//        /* Open a file for writing */
//        $fp = fopen(public_path() . '/uploads/mynewfile.jpg', "w");
//
//        while ($data = fread($putdata, 1024))
//            fwrite($fp, $data);
//
//        fclose($fp);
//        fclose($putdata);

    }

}
