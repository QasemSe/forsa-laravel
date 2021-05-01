<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyLink extends Model
{
    use  SoftDeletes;

    protected $fillable = [
        'company_id',
        'facebook_url',
        'twitter_url',
        'whatsapp_url',
        'instagram_url',
        'linkedin_url',
        'behance_url',
        'website_url',
    ];
}
