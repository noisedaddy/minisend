<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
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
//            'account_id' => $this->account_id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'full_name' => $this->full_name,
//            'role' => $this->role,
            'email' => $this->email,
            'timezone' => $this->timezone,
            'last_login' => $this->last_login,
            'first_login' => $this->first_login,
            'avatar' => $this->avatar ? public_path('user_media/' . $this->avatar) : null,
//            'account' => $this->account ? $this->account : null,
        ];
    }
}
