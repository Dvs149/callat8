<?php

namespace App\dgmodel;

use Illuminate\Database\Eloquent\Model;

class EmailModel extends Model
{
    protected $table = 'email';
    public $timestamps = false;
    protected $guarded = ['id'];
}
