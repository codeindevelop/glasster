<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostComment extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = [
        'post_id',
        'user_id',
        'comment_parent',
        'comment_author_email',
        'comment_author_url',
        'comment_author_IP',
        'comment_content',
        'comment_approved',
    ];

}
