<?php

namespace App\dgmodel;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = 'customer_feedback';
    public $timestamps = false;
    protected $guarded = ['id'];

    public function doubleGoogleOrder()
    {
        return $this->belongsTo('App\DoubleGoogleOrderModel', 'double_google_order_id', 'id');
    }

    public function driver()
    {
        return $this->belongsTo('App\dgmodel\Driver', 'driver_id', 'id');
    }
    public function customer()
    {
        return $this->belongsTo('App\dgmodel\Customer', 'user_id', 'id');
    }
    public function getRateAttribute()
    {
        return number_format((float)$this->attributes['rate'], 1, '.', '');
        // return $this->attributes['rate'];
    }
}
