<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class JobApplication extends JsonResource
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
            'resume' => $this->getResume(),
            'userDetail' => new User($this->getUserId()),
            'jobDetail' => new Job($this->getJobPostedId())
        ];
    }
}
