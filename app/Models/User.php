<?php

namespace App\Models;

use App\Models\Profile\PersonalUserInfo;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens,HasRoles, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'profile_pic',
        'mobile_number',
        'activation_token',
        'email',
        'register_ip',
        'active',
        'password',
        'sms_token',
    ];

    protected $guard_name = 'api';

    protected $dates = ['deleted_at'];

    
    protected static $logAttributes = [
        'first_name',
        'last_name',
        'mobile_number',
        'profile_pic',
        'activation_token',
        'active',
        'email',
        'password',
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'activation_token',
        'sms_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'mobile_verified_at' => 'datetime',
    ];


     // Check user phone verification
     public function userMobileVerified()
     {
         return !is_null($this->mobile_verified_at);
     }

     
    // Get user personal information
    public function personalInfos()
    {
        return $this->hasOne(PersonalUserInfo::class);
    }

}
