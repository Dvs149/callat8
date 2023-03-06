<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class DoubleGoogleOrderModel extends Model
{

    protected $table = 'double_google_order';
    protected $guarded = [];

    protected $appends = ['last_delivery_receiver_name'];



    public function orderType()
    {
        return $this->hasOne('App\OrderTypeModel', 'id', 'order_type_id');
    }

    public function promoCode()
    {
        return $this->promoCode('App\PromoCodeModel', 'id', 'promo_code_id');
    }

    public function sendingItem()
    {
        return $this->sendingItem('App\SendingItemModel', 'id', 'sending_item_id');
    }

    public function orderAddress()
    {
        return $this->hasMany('App\OrderAddressModel', 'double_google_order_id', 'id');
    }

    public function customer()
    {
        return $this->belongsTo('App\dgmodel\Customer', 'user_id', 'id');
    }

    public function doubleGoogleOrderItems()
    {
        return $this->hasMany('App\dgmodel\DoubleGoogleOrderItems', 'double_google_order_id', 'id');
    }

    public function doubleGoogleOrderPhoto()
    {
        return $this->hasOne('App\dgmodel\DoubleGoogleOrderPhotos', 'double_google_order_id', 'id');
    }

    public function feedback()
    {
        return $this->hasOne('App\dgmodel\Feedback', 'double_google_order_id', 'id');
    }
    

    public function getLastDeliveryReceiverNameAttribute()
    {
        return !empty($this->orderAddress->first()) ? $this->orderAddress->first()->delivery_receiver_name : '';
    }

    /* public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->created_at)->format('d-m-Y h:m A');
    } */

    public function driver()
    {
        return $this->belongsTo('App\dgmodel\Driver', 'driver_id', 'id');
    }

    public function store()
    {
        return $this->belongsTo('App\dgmodel\Store', 'store_id', 'id');
    }

    

    public function orderUpdateLog()
    {
        return $this->hasOne('App\OrderUpdateLog', 'double_google_order_id', 'id');
    }

    public function remarks()
    {
        return $this->hasOne('App\dgmodel\Remark', 'double_google_order_id', 'id');
    }


    public function delete()
    {
        // delete all related photos 
        $this->orderAddress()->delete();
        $this->doubleGoogleOrderItems()->delete();
        $this->remarks()->delete();
        $this->orderUpdateLog()->delete();
        $this->doubleGoogleOrderPhoto()->delete();
        // as suggested by Dirk in comment,
        // it's an uglier alternative, but faster
        // Photo::where("user_id", $this->id)->delete()

        // delete the user
        return parent::delete();
    }
    public function getDeliveryFeeAttribute()
    {
        return bcdiv($this->attributes['delivery_fee'],1,2);
    }
    public function getParcelValueAttribute()
    {
        return bcdiv($this->attributes['parcel_value'],1,2);
    }
}
