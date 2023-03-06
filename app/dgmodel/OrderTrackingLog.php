<?php

namespace App\dgmodel;

use Illuminate\Database\Eloquent\Model;

class OrderTrackingLog extends Model
{
    protected $table = 'order_tracking_log';
    public $timestamps = false;
    protected $guarded = [];
}
