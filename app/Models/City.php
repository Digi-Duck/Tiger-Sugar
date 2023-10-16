<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';
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
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function Shops()
    {
        return $this->hasMany(Shop::class, 'city_id')->orderBy('sort','asc');
    }

    public function Contact()
    {
        return $this->hasMany(Shop::class, 'city_id')->orderBy('sort','asc');
    }
}
