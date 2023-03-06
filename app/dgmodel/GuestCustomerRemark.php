<?php

namespace App\dgmodel;

use Illuminate\Database\Eloquent\Model;

class GuestCustomerRemark extends Model
{
    protected $table = 'guest_customer_remark';
    public $timestamps = true;
    protected $guarded = ['id'];

    public function guest_customer()
    {
        return $this->belongsTo('App\dgmodel\GuestCustumer', 'guest_customer_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
