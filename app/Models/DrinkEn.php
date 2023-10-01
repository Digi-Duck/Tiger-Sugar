<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DrinkEn extends Model
{
    protected $table = 'drinks_en';
    protected $fillable = [
        'type_id',
        'drink_name',
        'cold',
        'hot',
        'sort'
    ];
    public $timestamps = false;

    public function DrinkTypeEn()
    {
        return $this->belongsTo(DrinkTypeEn::class, 'type_id');
    }
}
