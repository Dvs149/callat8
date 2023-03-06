<?php

namespace App\dgmodel;

use Illuminate\Database\Eloquent\Model;

class DoubleGoogleOrderPhotos extends Model
{
    protected $table = 'double_google_order_photos';
    public $timestamps = false;
    protected $guarded = ['id'];
    protected $appends = [
        'pickup_location_photo_url',
        'pickup_material_photo_url',
        'pickup_challan_photo_url',
        'delivered_location_photo_url',
        'delivered_material_photo_url',
        'delivered_challan_photo_url'
    ];
    
    public function doubleGoogleOrder()
    {
        return $this->belongsTo('App\DoubleGoogleOrderModel', 'id', 'double_google_order_id');
    }

    public function getPickupLocationPhotoUrlAttribute()
    {
        return $this->attributes['pickup_location_photo'] ? url(config('custom.PICKUP_LOCATION_IMAGE_PATH') . $this->attributes['pickup_location_photo']): null;
    }

    public function getPickupMaterialPhotoUrlAttribute()
    {
        return $this->attributes['pickup_material_photo'] ? url(config('custom.PICKUP_MATERIAL_IMAGE_PATH') . $this->attributes['pickup_material_photo']): null;
    }

    public function getPickupChallanPhotoUrlAttribute()
    {
        return $this->attributes['pickup_challan_photo'] ? url(config('custom.PICKUP_CHALAN_IMAGE_PATH') . $this->attributes['pickup_challan_photo']) : null ;
    }

    public function getDeliveredLocationPhotoUrlAttribute()
    {
        return $this->attributes['delivered_location_photo'] ? url(config('custom.DELEIVERED_LOCATION_IMAGE_PATH') . $this->attributes['delivered_location_photo']) : null;
    }

    public function getDeliveredMaterialPhotoUrlAttribute()
    {
        return $this->attributes['delivered_material_photo'] ? url(config('custom.DELEIVERED_MATERIAL_IMAGE_PATH') . $this->attributes['delivered_material_photo']) : null;
    }

    public function getDeliveredChallanPhotoUrlAttribute()
    {
        return $this->attributes['delivered_challan_photo'] ? url(config('custom.DELEIVERED_CHALAN_IMAGE_PATH') . $this->attributes['delivered_challan_photo']) : null;
    }

}
