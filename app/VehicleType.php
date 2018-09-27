<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleType extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'Type_Id';
    protected $table = 'vehicle_types';
}
