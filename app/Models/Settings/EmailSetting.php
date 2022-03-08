<?php

namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'email_protocol',
        'email_encryption',
        'email',
        'smtp_host',
        'smtp_port',
        'smtp_username',
        'smtp_password',
        'email_charset',
        'email_signature',
        'email_logo',
        'email_header',
        'email_footer',
        'show_instagram',
        'show_twitter',
        'show_facebook'
    ];
}
