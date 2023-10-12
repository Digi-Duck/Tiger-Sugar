<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $table = 'shops';
    protected $fillable = [
        'city_id',
        'country_id',
        'name',
        'address',
        'phone',
        'sort'
    ];
    public $timestamps = false;

    public function Country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
    public function City()
    {
        return $this->belongsTo(City::class, 'city_id');
    }
}
