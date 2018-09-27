<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'Staff_No';
    protected $table = 'staffs';
}
