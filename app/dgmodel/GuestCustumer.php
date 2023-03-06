<?php

namespace App\dgmodel;

use Illuminate\Database\Eloquent\Model;

class GuestCustumer extends Model
{
    protected $table = 'guest_customer';
    protected $guarded = ['id'];

    public function guest_customer_remarks()
    {
        return $this->hasMany('App\dgmodel\GuestCustomerRemark', 'guest_customer_id', 'id');
    }
}
