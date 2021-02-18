<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarDriver extends Model
{
    public $timestamps = false;
    protected $table='Car_driver';
    protected $primaryKey = 'cd_id';
}
