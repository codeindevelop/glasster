<?php

namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'register_type',
        'email_verification',
        'otp_login',
        'can_register',
        'facebook_login',
        'google_login',
        'twitter_login',
    ];
}
