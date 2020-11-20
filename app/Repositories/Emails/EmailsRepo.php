<?php


namespace App\Repositories\Emails;


use App\Models\Email;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Spatie\QueryBuilder\QueryBuilder;
use App\Repositories\Traits\FilterableTrait;

class EmailsRepo implements EmailsInterface {

    use FilterableTrait;

    /**
     * Allowed query for given user, in this case is allowed for all
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function getQuery()
    {
        return Email::query();
    }

    /**
     * Find user by id
     * @param $id
     * @return \Illuminate\Database\Eloquent\Model|object|QueryBuilder|null
     */
    public function find($id)
    {
        return Email::where('id', $id)->first();
    }

    /**
     * Add new user
     * @param array $data
     * @return mixed
     */
    public function create($data) {
        return Email::create($data);
    }

    /**
     * Update user
     * @param array $data
     * @param $email
     * @return mixed
     */
    public function update(array $data, $email){
        return $email->update($data);
    }

    /**
     * Delete user
     * @param $email
     * @return mixed
     */
    public function delete($email){
        return $email->delete();
    }

    public function show($id){

    }

    /**
     * Search according to passed data and search criteria
     * @param array $data
     * @return array|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function search(array $data)
    {
        $search = $data['search_phrase'];
        $searchOptions = $data['values']['role'];
//        $search = $data['search'];
//        $searchOptions = explode(',',$data['values']);

        if (is_array($searchOptions) && !empty($searchOptions)){
            $query = Email::query();
            foreach ($searchOptions as $key=>$value){
                $query->orWhere("$value" ,'LIKE', '%' . $search . '%');
            }
            return $query->get();
        } else {
            return [];
        }
    }

}
