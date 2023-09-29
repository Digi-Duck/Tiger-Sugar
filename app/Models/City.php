<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'city';
    protected $fillable = [
        'country_id',
        'city_name',
        'city_name_en',
        'city_photo',
        'sort',
        'link',
        'fb_link',
        'ig_link',
        'weibo_link'
    ];
    public $timestamps = false;

    public function Country()
    {
        return $this->belongsTo(country::class, 'country_id');
    }

    public function Shops()
    {
        return $this->hasMany(shops::class, 'city_id')->ordeerBy('sort','asc');
    }
}