<?php

namespace App\dgmodel;

use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    protected $table = 'order_status';
    public $timestamps = false;
    protected $guarded = [];
}
