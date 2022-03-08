<?php

namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SmsSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'sms_gateway_name',
        'gateway_send_url',
        'gateway_api_key',
        'gateway_send_number',
        'gateway_receive_number',
        'active',
    ];
}
