<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'username' => $this->name,
            'email' => $this->email,
            'degree' => $this->degree_name,
            'Specialization' => $this->specialize_name,
            'uneversity' => $this->university_name,
            'avarege' => $this->avarage,
            'mobileNum' => $this->mobile_number,
            'image' => $this->image,
            'skills' =>   SkillResource::collection($this->skills),
            'profileLink' => new UserLinkResource($this->link),
            'access_token' => $this->when($this->access_token, $this->access_token),
        ];
    }
}
