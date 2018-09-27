<?php

namespace App\Http\Controllers;

use App\ArchiveBooking;
use Illuminate\Http\Request;

/**
 * @author: David Buttler
 * @version: 1.0
 * @since: 10-11-2017
 *
 * Class ArchiveBookingController
 * @package App\Http\Controllers
 *
 * This .php Controller was made to provide functionality with the archiving of booking records.
 */
class ArchiveBookingController extends Controller
{
    /**
     * Returns the View object that contains the archived bookings.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View         View with an array of archive booking
     *                                                                          records
     */
    public function index() {
        $archiveBookings = ArchiveBooking::orderBy('Archive_Booking_No', 'dsc')->get();

        return view('archiveBooking.archiveBookings', ['archiveBookings' => $archiveBookings]);
    }

    /**
     * Allows the user to view the details of an archived booking.
     *
     * @param $Archive_Booking_No                                               Archive Booking number of the record being
     *                                                                          viewed
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View         View with an archive booking object
     *                                                                          associated with it
     */
    public function viewArchiveBooking($Archive_Booking_No) {
        $archiveBooking = ArchiveBooking::find($Archive_Booking_No);

        return view('archiveBooking.viewArchiveBooking', ['archiveBooking' => $archiveBooking]);
    }
}
