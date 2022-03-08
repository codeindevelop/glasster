<?php

namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'website_name',
        'company_name',
        'main_domain',
        'rtl_admin',
        'rtl_userpanel',
        'rtl_site',
        'favicon_file',
        'main_logo_light',
        'main_logo_dark',
        'footer_logo',
    ];
}
