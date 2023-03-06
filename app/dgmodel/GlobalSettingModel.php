<?php

namespace App\dgmodel;

use Illuminate\Database\Eloquent\Model;

class GlobalSettingModel extends Model
{
    protected $table = 'global_setting';
    public $timestamps = false;
    protected $guarded = ['id'];

    public function getSettingValueAttribute($value)
    {
        return json_decode($value,true);
    }
}
