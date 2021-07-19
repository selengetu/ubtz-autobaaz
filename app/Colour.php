<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Colour extends Model
{
    public $timestamps = false;
    protected $table='Const_car_colour';
    protected $primaryKey = 'colour_id';
}
