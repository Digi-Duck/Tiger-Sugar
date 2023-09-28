<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Franchise extends Model
{
    protected $table = 'franchise';
    protected $fillable = [
        'country_name',
        'continent_id',
        'country_en_name',
        'country_photo',
        'country_number',
        'sort',
        'link',
        'fb_link',
        'ig_link',
        'weibo_link',
        'continent_id'
    ];
    public $timestamps = false;

    public function Continent()
    {
        return $this->belongsTo(Continent::class, 'continent_id');
    }

    public function Area()
    {
        return $this->hasMany(Area::class, 'franchise_id')->with('stores')->orderBy('sort','desc');
    }

    public function Store()
    {
        return $this->hasMany(Store::class, 'franchise_id')->orderBy('sort','desc');
    }

}
