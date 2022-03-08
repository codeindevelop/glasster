<?php

namespace App\Models\Email;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailTemplate extends Model
{
    use HasFactory;

    protected $fillable = [
        'language_id',
        'template_name',
        'subject',
        'from_name',
        'email_text',
        'active',  
    ];
}
