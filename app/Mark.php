<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    public $timestamps = false;
    protected $table='Const_car_mark';
    protected $primaryKey = 'mark_id';
}
