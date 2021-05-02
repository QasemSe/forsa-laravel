<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Applicant extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'post_id',
        'notes',
        'status'
    ];

    protected $appends  = ['status_value', 'post_title', 'user_name', 'company_name'];


    public function getPostTitleAttribute()
    {
        return $this->post ? $this->post->title : null;
    }

    public function getUserNameAttribute()
    {
        return $this->user ? $this->user->name : null;
    }

    public function getCompanyNameAttribute()
    {
        return $this->post->company ? $this->post->company->name : null;
    }



    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function getStatusValueAttribute()
    {
        switch ($this->status) {
            case 'review':
                return  "<span class='badge badge-secondary'>" . t("Review") . "</span>";
            case 'accepted':
                return  "<span class='badge badge-success'>" . t("Accepted") . "</span>";
            case 'canceled':
                return  "<span class='badge badge-danger'>" . t("Canceled") . "</span>";
            default:
                '';
        }
    }
}
