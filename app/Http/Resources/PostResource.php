<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'companyName' => $this->company_name,
            'createAT' => $this->created_at->format('Y-m-d'),
            'dueDate' => $this->expire_date->format('Y-m-d'),
            'imageCompany' => $this->company ? $this->company->profile_image : '',
            'posttext' => $this->title,
            'status' => $this->status_text,
            'skills' =>   SkillResource::collection($this->skills),
        ];
    }
}
