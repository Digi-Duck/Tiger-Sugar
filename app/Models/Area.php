<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table = 'area';
    protected $faillable =  [
        'franchise_id' ,
        'area_name' ,
        'sort' ,
    ];
    public $timestamps = false;

    public function Franchise()
    {
        return $this->belongsTo('App\Franchise', 'franchise_id');
    }

    public function Stores()
    {
        return $this->hasMany('App\Store', 'area_id')->orderBy('sort','desc');
    }
}
