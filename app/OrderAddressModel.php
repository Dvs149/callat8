<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderAddressModel extends Model
{
    protected $table = 'order_address';
    protected $guarded = ['id'];

    public function doubleGoogleOrder()
    {
        return $this->belongsTo('App\DoubleGoogleOrderModel','id','double_google_order_id');
    }

}
