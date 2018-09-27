<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = 'Rego_No';
    protected $table = 'vehicles';
}
