<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table = 'banners';
    protected $fillable = [
        'type',
        'pc_image_url',
        'mb_image_url',
        'image_alt',
        'link_url',
        'link_target',
        'pc_video_url',
        'mb_video_url',
        'sort'
    ];
     public $timestamps = false;
}
