<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'image',
        'mobile_number',
        'avarage',
        'specialize_id',
        'degree_id',
        'university_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */


    public function getImageAttribute($image)
    {
        return is_null($image) ? null : asset($image);
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'user_skills');
    }


    public function degree()
    {
        return $this->belongsTo(Degree::class);
    }

    public function specialize()
    {
        return $this->belongsTo(Specialize::class);
    }

    public function university()
    {
        return $this->belongsTo(University::class);
    }

    // الطلبات
    public function applicants()
    {
        return $this->hasMany(Applicant::class);
    }














    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
        'deleted_at' => 'datetime:Y-m-d H:i:s',
        'email_verified_at' => 'datetime',

    ];
}
