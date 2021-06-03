<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserLink extends Model
{
    use  SoftDeletes;

    protected $fillable = [
        'user_id',
        'facebook_url',
        'twitter_url',
        'whatsapp_url',
        'instagram_url',
        'linkedin_url',
        'behance_url',
        'website_url',
    ];
}
