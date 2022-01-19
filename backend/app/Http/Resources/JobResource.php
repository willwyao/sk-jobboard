<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class JobResource extends JsonResource
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
            'job_title' => $this->job_title,
            'job_description' => $this->job_description,
            'date' => $this->date,
            'location' => $this->location,
            'applicants'=> ApplicantResource::collection($this->applicants)            
        ];
    }
}
