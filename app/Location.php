<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'Location_Id';
    protected $table = 'locations';
}