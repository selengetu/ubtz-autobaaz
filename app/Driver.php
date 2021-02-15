<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    public $timestamps = false;
    protected $table='CONST_DRIVER';
    protected $primaryKey = 'driver_id';
}
