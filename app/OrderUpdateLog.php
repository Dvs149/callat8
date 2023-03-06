<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderUpdateLog extends Model
{
    protected $table = 'order_update_log';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function doubleGoogleOrder()
    {
        return $this->belongsTo('App\DoubleGoogleOrderModel','id','double_google_order_id');
    }
}
