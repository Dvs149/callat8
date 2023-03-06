<?php

namespace App\dgmodel;

use Illuminate\Database\Eloquent\Model;

class DoubleGoogleOrderItems extends Model
{
    protected $table = 'double_google_order_items';
    public $timestamps = false;
    protected $guarded = ['id'];

    public function doubleGoogleOrder()
    {
        return $this->belongsTo('App\DoubleGoogleOrderModel','id','double_google_order_id');
    }

} 
