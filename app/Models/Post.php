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
    protected $appends  = ['status_value', 'company_name'];




    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'post_skills');
    }


    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function getCompanyNameAttribute()
    {
        if ($this->company) {
            return $this->company->name;
        } else {
            return null;
        }
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

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
        'deleted_at' => 'datetime:Y-m-d H:i:s',
        'expire_date' => 'datetime:Y-m-d',
    ];
}
