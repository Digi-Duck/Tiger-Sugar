<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DrinkType extends Model
{
    protected $table = 'drink_type';
    protected $fillable = [
        'type_name',
        'type_info',
        'sort'
    ];
    public $timestamps = false;

    public function Drink()
    {
        return $this->hasMany(Drink::class, 'type_id')->orderBy('sort', 'asc');
    }
}
