<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CModel extends Model
{
    public $timestamps = false;
    protected $table='Const_car_model';
    protected $primaryKey = 'model_id';
}
