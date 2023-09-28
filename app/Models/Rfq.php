<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rfq extends Model
{
    use SoftDeletes;

    protected $table = 'rfq';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'id',
        'name',
        'birthday',
        'email',
        'phone',
        'address',
        'channel',
        'city',
        'other',
        'products_id',
        'created_at'
    ];
}
