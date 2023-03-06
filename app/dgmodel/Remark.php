<?php

namespace App\dgmodel;

use Illuminate\Database\Eloquent\Model;

class Remark extends Model
{
    protected $table = 'remarks';
    // public $timestamps = false;
    protected $guarded = [];

    public function doubleGoogleOrder()
    {
        return $this->belongsTo('App\DoubleGoogleOrderModel', 'id', 'double_google_order_id');
    }
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
