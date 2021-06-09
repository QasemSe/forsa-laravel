<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ApplicantsResource extends JsonResource
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
            'companyName' => $this->post ? $this->post->company_name : '',
            'date' => $this->created_at->format('Y-m-d H:i'),
            'postText' => $this->post_title,
            'applicant_notes' =>  $this->notes,
            'status' => $this->status_text,
            'skills' => $this->post ? SkillResource::collection($this->post->skills) : '',
        ];
    }
}
