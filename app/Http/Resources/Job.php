<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Job extends JsonResource
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
            'jobId' => $this->getId(),
            'jobTitle' => $this->getJobTitle(),
            'noOfPosition' => $this->getNoOfPosition(),
            'experience' => $this->getExperience()." yrs",
            'jobLocation' => $this->getJobLocation(),
            'jobSkills' => $this->getJobSkill(),
            'jobDescription' => $this->getJobDescription(),
            'postedDate' => date_diff($this->getCreatedAt(), new \DateTime('now'))->format("%a days ago")
        ];
    }
}
