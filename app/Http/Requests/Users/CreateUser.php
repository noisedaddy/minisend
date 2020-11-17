<?php

namespace App\Http\Requests\Users;

use App\Http\Requests\BaseRequest;

class CreateUser extends BaseRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {


        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
//             'image' => 'required|mimes:jpeg,png,jpg,gif,svg',
        ];
    }

    public function attributes()
    {
        return [
            'first_name' => 'first name',
            'last_name' => 'last name',
            'email' => 'email ',
        ];
    }
}
