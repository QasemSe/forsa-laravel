<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'company_id',
        'description',
        'expire_date',
        'status'
    ];
    protected $appends  = ['status_value', 'status_text', 'company_name'];




    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'post_skills');
    }

    public function applicants()
    {
        return $this->hasMany(Applicant::class);
    }



    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function getCompanyNameAttribute()
    {
        return $this->company ? $this->company->name : null;
    }

    public function getStatusValueAttribute()
    {
        switch ($this->status) {
            case '1':
                return  "<span class='badge badge-success'>" . t("Active") . "</span>";
            case '0':
                return  "<span class='badge badge-danger'>" . t("inactive") . "</span>";
            default:
                '';
        }
    }

    public function getStatusTextAttribute()
    {
        switch ($this->status) {
            case '1':
                return   t("Active");
            case '0':
                return  t("inactive");
            default:
                '';
        }
    }

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
        'deleted_at' => 'datetime:Y-m-d H:i:s',
        'expire_date' => 'date:Y-m-d',
    ];
}
