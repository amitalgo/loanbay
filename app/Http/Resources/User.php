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
            'firstName' => $this->getFirstName(),
            'lastName' => $this->getLastName(),
            'email' => $this->getEmail(),
            'contactNumber' => $this->getContactNumber(),
            'profileImage' => null!=$this->getProfileImage()?$this->getProfileImage():"",
            'role' => $this->getUserRole()->getRole()
        ];
    }
}
