<?php

namespace App\Http\Controllers;

use App\Http\Requests\Emails\Search;
use App\Http\Requests\Emails\CreateEmail;
use App\Http\Requests\Emails\Upload;
use App\Jobs\SendEmail;
use App\Models\Attachment;
use App\Models\Email;
use App\Repositories\Emails\EmailsRepo;
use App\Repositories\User\UserRepo;
use App\Http\Resources\Email as EmailResource;
use App\Repositories\Users\UsersRepo;
use App\Services\File\FileUpload;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;


class EmailController extends Controller
{
    protected $emailsRepo;

    public function __construct(EmailsRepo $emailsRepo)
    {
        $this->emailsRepo = $emailsRepo;
    }

    /**
     * Get paginated emails.
     * search - string, search within user first name, last name and email
     * role - integer list eg. role=1,2,4 means show only users who have role Super Admin or Account Admin or Evaluator
     * order - signifies order by column (e.g. order=+name means order by name ascending)
     * account_id
     * page - current paginated page
     * ?page=5&search[name]=john,mike&account_id=4,role=3&order=acs
     */
    public function index()
    {
        $url = Request::all();
        $query = $this->emailsRepo->getAllowedQueryFor();
        $data = $this->emailsRepo->filterQuery($url, $query)->paginate();

        return EmailResource::collection($data);
    }

    public function show($id)
    {
        $showEmail = $this->emailsRepo->find($id);

        if (!$showEmail) {
            return $this->notFound();
        }

        return new EmailResource($showEmail);

    }

    public function store(CreateEmail $request)
    {
        $request->merge(
            array(
                'user_id' => auth()->user()->id,
                'status' => 'posted'
            )
        );
        $data = $request->all();
        $newEmail = $this->emailsRepo->create($data);
        if ($newEmail) {
            //Dispatch new email send job with delay of 30 sec
            dispatch(new SendEmail($newEmail))->delay(Carbon::now()->addSeconds(50));
        }
//        return $newEmail->attachments()->get();
        return new EmailResource($newEmail);
    }

    /**
     * Accept data from PUT request in form-data structure, used without binary header part
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function uploadAttachment($id){

        $file = FileUpload::handle();
        if (isset($file['success'])) {
            $email = Email::find($id);
            return $this->dataResponse($file['success']);
        } else{
            return $this->errorResponse($file['error']);
        }

    }

    /**
     * Post request for attachments upload
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handleUpload(Upload $request){

        $fileName = time().'.'.$request->file->getClientOriginalExtension();
        $fileMime = $request->file->getClientMimeType();
        if ($request->file->move(public_path('uploads/'.$request->uniqueID.'/'), $fileName)) {
            $attachment = new Attachment();
            $attachment->path = public_path('uploads/'.$request->uniqueID.'/').$fileName;
            $attachment->name = $fileName;
            $attachment->mime = $fileMime;
            $attachment->uniqueID = $request->uniqueID;
            $attachment->save();
            return response()->json(['success'=>$fileName, 'path' => public_path('uploads/'.$request->uniqueID.'/').$fileName]);
        } else {
            return response()->json(['error'=>'Error uploading file']);
        }


    }

    /**
     * Search
     * @param Request $request
     * @return array
     */
    public function search(Search $request){
        return $this->emailsRepo->search($request->toArray());
    }

}
