<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'country';
    protected $fillable = [
        'continent_id',
        'country_name',
        'country_en_name',
        'country_photo',
        'sort',
        'link',
        'fb_link',
        'ig_link',
        'weibo_link',
        'contient_id'
    ];
    public $timestamps = false;

    public function Continent()
    {
        return $this->belongsTo(Continent::class, 'continent_id');
    }
    public function City()
    {
        return $this->hasMany(City::class, 'country_id')->with('shop')->orderBy('sort','asc');
    }
    public function Shops()
    {
        return $this->hasMany(Shop::class, 'country_id')->orderBy('sort','asc');
    }
}
