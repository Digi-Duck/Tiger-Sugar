<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Drink extends Model
{
    protected $table = 'drinks';
    protected $fillable = [
        'type_id',
        'drink_name',
        'cold',
        'hot',
        'sort'
    ];
    public $timestamps = false;

    public function drinkType()
    {
        return $this->belongsTo(DrinkType::class, 'type_id');
    }
}
