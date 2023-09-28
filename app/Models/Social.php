<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    protected $table = 'social';
    protected $fillable = [
        'type',
        'embed_link',
        'embed_name',
        'sort',
        'user_icon',
        'user_name',
        'user_account',
        'social_icon',
        'social_icon_color',
        'link_title',
        'link_href',
        'link_target',
        'social_info',
        'post_date'
    ];
    public $timestamps = false;
}
