<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Email extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'sender' => $this->sender,
            'recipient' => $this->recipient,
            'subject' => $this->subject,
            'text_content' => $this->text_content,
            'html_content' => $this->html_content,
            'status' => $this->status
        ];
    }
}
