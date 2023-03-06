<?php

namespace App\dgmodel;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';
    public $timestamps = false;
    protected $guarded = ['id'];

    

    

}
