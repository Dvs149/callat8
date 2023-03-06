<?php

namespace App\dgmodel;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $table = 'store_or_restaurant';
    public $timestamps = false;
    protected $guarded = [];
    protected $appends = ['logo_image_url'];
    
    public function getLogoImageUrlAttribute() {
        return url(config('custom.STORE_IMAGE_PATH').$this->attributes['logo']);
    }
    

    public function getOpenTimeAttribute() {
        $open_time=date('h:i A', strtotime($this->attributes['open_time']));
        return $open_time;
    }

    public function getCloseTimeAttribute() {
        $open_time=date('h:i A', strtotime($this->attributes['close_time']));
        return $open_time;
    }
    public function doubleGoogleOrder()
    {
        return $this->hasMany('App\DoubleGoogleOrderModel','store_id','id');
    }

}
