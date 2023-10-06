<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'id',
        'sort',
        'title_zh',
        'title_en',
        'type_id',
        'info',
        'img',
        'launch_date',
        'weight',
        'shelf_life',
        'preserve',
        'content',
        'notes',
        'video'
    ];
    public function ProductsType()
    {
        return $this->belongsTo(ProductsType::class, 'type_id');
    }
    public function ProductsImgs()
    {
        return $this->hasMany(ProductsImgs::class, 'product_id');
    }
}
