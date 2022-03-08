<?php

namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentSetting extends Model
{
    use HasFactory;
    
    protected $fillable =[
        'gatevay_name',
        'gateway_merchant_id',
        'request_url',
        'currency',
        'active',
    ];
}
