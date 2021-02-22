<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarRepair extends Model
{
    public $timestamps = false;
    protected $table='Car_repair';
    protected $primaryKey = 'cr_id';
}
