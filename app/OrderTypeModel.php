<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderTypeModel extends Model
{
    protected $table = 'order_type';
    protected $guarded = ['id'];
}
