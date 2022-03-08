<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ["id", "created_at", "updated_at"];

    protected $fillable = [
        'category_id',
        'author_id',
        'publish_id',
        'post_name',
        'slug',
        'post_content',
        'post_featured_image',
        'comment_status',
        'active',
        'publish_date',
        'post_password',
        'reads',
        'search_engine_flow',
        'search_engine_index',
        'canonical_link',
        'meta_title',
        'meta_keywords',
        'meta_description',
        'meta_tags',
        'og_locale',
        'og_title',
        'og_description',
        'og_type',
        'og_url',
        'og_site_name',
        'og_image',
        'twitter_card',
        'twitter_creatort',
        'twitter_label1',
        'twitter_data1',
        'twitter_label2',
        'twitter_data2',
        'twitter_site',
        'twitter_title',
        'twitter_description',
        'twitter_url',
        'twitter_image',
        'article_publisher',
        'article_publish_time',
        'article_modified_time',
    ];

   
}
