<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogNews extends Model
{
    protected $table = 'blog_news';
    protected $fillable = [
        'date',
        'title',
        'info',
        'author',
        'sort',
        'main_photo',
        'link',
    ];
    public $timestamps = false;
}
