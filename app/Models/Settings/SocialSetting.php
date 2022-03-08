<?php

namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'instagram',
        'telegram',
        'whatsapp',
        'whatsapp_business',
        'facebook_user',
        'facebook_page',
        'twitter',
        'skype',
        'youtube',
        'aparat',
        'tiktok',
        'pintrest',
        'linkdin',
        'dribbble',
        'snapchat',
    ];
}
