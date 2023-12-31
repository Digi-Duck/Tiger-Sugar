<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use SoftDeletes;

    protected $table = 'contacts';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'user_name',
        'birth_day',
        'email',
        'phone',
        'address',
        'franchisee_type',
        'country',
        'capital',
        'store_address',
        'other',
    ];

    public function Country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function City()
    {
        return $this->belongsTo(City::class, 'city_id');
    }
}
