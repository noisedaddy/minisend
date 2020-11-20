<?php

namespace App\Http\Controllers;

use App\Http\Requests\Emails\Delete;
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
     * If search options are ON, search - string, search within search term, subject, recipient and sender
     * order - signifies order by column (e.g. order=+name means order by name ascending)
     * page - current paginated page
     * getAllowedQueryFor is for filtering API calls. In this case is blank because is simply queries
     */
    public function index()
    {
        $url = Request::all();
        if (isset($url['search']) && !empty($url['search'])) {
            $data = $this->emailsRepo->search($url)->paginate();
        } else {
            $query = $this->emailsRepo->getQuery();
            $data = $this->emailsRepo->filterQuery($url, $query)->paginate();
        }

        return EmailResource::collection($data);
    }

    /**
     * Show details for one email
     * @param $id
     * @return EmailResource|\Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $showEmail = $this->emailsRepo->find($id);

        if (!$showEmail) {
            return $this->notFound();
        }

        return new EmailResource($showEmail);

    }

    /**
     * Store and send emails
     * @param CreateEmail $request
     * @return EmailResource
     */
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
            dispatch(new SendEmail($newEmail))->delay(Carbon::now()->addSeconds(20));
        }
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

    /**
     * Delete file from db and return rest of uploaded files
     */
    public function deleteFiles(Delete $request){

        $file = Attachment::where('uniqueID',$request->uniqueID)->where('name',$request->name)->delete();
        if ($file) {
            \File::delete(public_path('uploads/'.$request->uniqueID.'/').$request->name);
            return Attachment::where('uniqueID',$request->uniqueID)->get('name','path');
        } else {
            return false;
        }

    }
}
