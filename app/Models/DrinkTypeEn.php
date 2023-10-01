<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DrinkTypeEn extends Model
{
    protected $table = 'drink_types_en';
    protected $fillable = [
        'type_name',
        'type_info',
        'sort'
    ];
    public $timestamps = false;

    public function DrinkEn()
    {
        return $this->hasMany(DrinkEn::class, 'type_id')->orderBy('sort', 'asc');
    }
}
