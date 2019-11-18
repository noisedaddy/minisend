<?php

namespace App\Http\Requests\Users;

use App\Http\Requests\BaseRequest;

class CreateUser extends BaseRequest
{
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
            'account_id' => ''
            // 'image' => 'required|mimes:jpeg,png,jpg,gif,svg',
        ];
    }
}
