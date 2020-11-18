<?php

namespace App\Http\Requests\Emails;

use Illuminate\Foundation\Http\FormRequest;

class CreateEmail extends FormRequest
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
            'sender' => 'required|email',
            'recipient' => 'required|email',
            'subject' => 'required',
            'text_content' => 'required',
            'html_content' => 'required',
//             'image' => 'required|mimes:jpeg,png,jpg,gif,svg',
        ];
    }
}
