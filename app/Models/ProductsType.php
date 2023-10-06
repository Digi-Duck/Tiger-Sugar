<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductsType extends Model
{
    protected $table = 'product_types';
    protected $fillable = [
        'id',
        'sort',
        'tw_name',
        'en_name',
    ];
    public $timestamps = false;

    public function Products()
    {
        return $this->hasMany(Products::class, 'type_id')->orderBy('sort','asc');
    }
}
