<?php


namespace App\Models;

use App\Models\CompanyLink;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Company extends Authenticatable
{
    use  SoftDeletes, Notifiable, HasApiTokens;

    protected $guard = 'company';

    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'state',
        'mobile_number',
        'profile_image',
        'banner_image',
        'description',
        'status',
    ];


    protected $hidden = [
        'password',
    ];


    protected $appends  = ['status_value', 'status_text'];


    public function getProfileImageAttribute($image)
    {
        return is_null($image) ? null : asset($image);
    }

    public function link()
    {
        return $this->hasOne(CompanyLink::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }


    public function getBannerImageAttribute($image)
    {
        return is_null($image) ? null : asset($image);
    }


    public function getStatusValueAttribute()
    {
        switch ($this->status) {
            case '1':
                return  "<span class='badge badge-success '>" . t("Active") . "</span>";
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
                return   t("inactive");
            default:
                '';
        }
    }

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
        'deleted_at' => 'datetime:Y-m-d H:i:s',
    ];
}
