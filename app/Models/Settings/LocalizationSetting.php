<?php

namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocalizationSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'country_id',
        'language_id',
        'timezone_id',
    ];
}
