<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CompanyLinkResource extends JsonResource
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
            'facebook' => $this->facebook_url,
            'twitter' => $this->twitter_url,
            'whatsapp' => $this->whatsapp_url,
            'instagram' => $this->instagram_url,
            'linkedin' => $this->linkedin_url,
            'behance' => $this->behance_url,
            'website' => $this->website_url,
        ];
    }
}
