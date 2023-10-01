<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $table = 'stores';
    protected $fillavle = [
        'franchise_id',
        'name',
        'address',
        'phone',
        'sort'
    ];
    public $timestamps = false;

    public function Franchise()
    {
        return $this->belongsTo(Franchise::class, 'franchise_id');
    }

    public function Area()
    {
        return $this->belongsTo(Area::class, 'area_id');
    }
}
