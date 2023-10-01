<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductsImgs extends Model
{
    protected $table = 'product_imgs';
    protected $fillable = [
        'id',
        'img_url',
        'product_id'
    ];
}
