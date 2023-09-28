<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Drink extends Model
{
    protected $table = 'drink';
    protected $fillable = [
        'type_id',
        'drink_name',
        'cold',
        'hot',
        'sort'
    ];
    public $timestamps = false;

    public function DrinkType()
    {
        return $this->belongsTo(DrinkType::class, 'type_id');
    }
}
