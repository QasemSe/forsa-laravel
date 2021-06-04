<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
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
            'name' => $this->name,
            'email' => $this->email,
            'Logoimage' => $this->profile_image,
            'bannerImage' => $this->banner_image,
            'aboutcompany' => $this->description,
            'mobileNum' => $this->mobile_number,
            'address' => $this->address,
            'status' => $this->status_text,
            'socailLinks' =>  new CompanyLinkResource($this->link),
            'access_token' => $this->when($this->access_token, $this->access_token),

        ];
    }
}
