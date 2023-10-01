<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Continent extends Model
{
    protected $table = 'continents';
    protected $fillable = [
        'continent_tw',
        'continent_en'
    ];
    public function Country()
    {
        return $this->hasMany(Country::class, 'continent_id')->with('city')->with('shops')->withCount('shops')->orderBy('sort','asc');
    }
}
