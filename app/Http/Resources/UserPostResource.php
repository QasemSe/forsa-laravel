<?php

namespace App\Http\Resources;

use App\Models\Applicant;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class UserPostResource extends JsonResource
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
            'companyId' => $this->company_id,
            'createAT' => $this->created_at->format('Y-m-d'),
            'dueDate' => $this->expire_date->format('Y-m-d'),
            'imageCompany' => $this->company ? $this->company->profile_image : '',
            'postTitle' => $this->title,
            'postText' => $this->description,
            'status' => $this->status_text,
            'skills' =>   SkillResource::collection($this->skills),
            'is_applicant' => (bool)Applicant::where('user_id', auth('api')->user()->id)->where('post_id', $this->id)->first()
        ];
    }
}
