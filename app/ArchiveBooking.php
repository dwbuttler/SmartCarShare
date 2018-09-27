<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArchiveBooking extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'Archive_Booking_No';
    protected $table = 'archive_bookings';
}
