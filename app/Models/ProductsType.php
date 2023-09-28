<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductsType extends Model
{
    protected $table = 'products_type';
    protected $fillable = [
        'id',
        'tw_name',
        'en_name',
        'sort'
    ];
    public $timestamps = false;

    public function Products()
    {
        return $this->hasMany(Products::class, 'type_id')->orderBy('sort','asc');
    }
}
