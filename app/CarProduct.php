<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarProduct extends Model
{
    public $timestamps = false;
    protected $table='Car_product';
    protected $primaryKey = 'cp_id';
}
