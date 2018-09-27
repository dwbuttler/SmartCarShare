<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'Booking_No';
    protected $table = 'bookings';
}
