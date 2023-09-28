<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FranchiseExplain extends Model
{
    protected $table = 'franchise_explains';
    protected $fillable = [
        'title',
        'content',
        'english_title',
        'english_content'
    ];
    public $timestamps =false;
}
