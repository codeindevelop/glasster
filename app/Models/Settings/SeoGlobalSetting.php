<?php

namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeoGlobalSetting extends Model
{
    use HasFactory;

    protected $fillable =[
        'site_default_title',
        'default_index',
        'default_follow',
        'default_meta_description',
        'default_twitter_cardtype',
        'default_twitter_site',
        'default_twitter_handle',
        'default_og_url',
        'default_og_sitename',
        'default_og_title',
        'default_og_type',
        'default_og_locale',
        'default_og_description',
        'default_og_image',
        'default_twitter_title',
        'default_twitter_description',
        'default_twitter_image',
        'default_facebook_title',
        'default_facebook_description',
        'default_facebook_image',
    ];
}
