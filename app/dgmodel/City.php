<?php

namespace App\dgmodel;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';
    public $timestamps = false;
    protected $guarded = [];
}
