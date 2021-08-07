<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ShowApplicantsResource extends JsonResource
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
            'date' => $this->created_at->format('Y-m-d H:i'),
            'postTitle' => $this->post_title,
            'postDescription' => $this->post->description ?? '',
            'applicant_notes' =>  $this->notes,
            'status' => $this->status_text,
            'skills' => $this->post ? SkillResource::collection($this->post->skills) : '',
            'user' => $this->user ? new UserResource($this->user) : '',
        ];
    }
}
