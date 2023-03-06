<?php

namespace App\dgmodel;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $table = 'price';
    public $timestamps = false;
    protected $guarded = [];
}
