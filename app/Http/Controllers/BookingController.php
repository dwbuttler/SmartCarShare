<?php

namespace App\Http\Controllers;

use App\ArchiveBooking;
use App\Booking;
use App\Member;
use App\Vehicle;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;

/**
 * @author: David Buttler
 * @version: 1.0
 * @since: 10-11-2017
 *
 * Class BookingController
 * @package App\Http\Controllers
 *
 * BookingController.php contains all the functionality to facilitate the handling of Booking records in the Smart Car
 * Share system.
 */
class BookingController extends Controller
{
    /**
     * Returns the View object that contains the bookings.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View     View with an array of booking records
     */
    public function index() {
        $booking = Booking::orderBy('Booking_No', 'dsc')->get();

        return view('booking.bookings', ['bookings' => $booking]);
    }

    /**
     * Allows the user to view the details of a booking.
     *
     * @param Booking $booking                                              Booking number of the record being viewed
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View     View with a booking object associated with it
     */
    public function viewBooking(Booking $booking) {
        return view('booking.viewBooking', ['booking' => $booking]);
    }

    /**
     * Displays Form for the user to create a new booking.
     *
     * @return $this                                                        Form containing all pre-populated data
     */
    public function displayForm() {
        $vehicles = Vehicle::orderBy('Rego_No', 'asc')->get();
        $members = Member::orderBy('Membership_No', 'dsc')->get();

        return view('booking.displayForm')->with('vehicles', $vehicles)->with('members', $members);
    }

    /**
     * Function that is called upon submitting the information for the new booking record.
     *
     * @param Request $request                                                      POST array values from form
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector     View that the user will be redirected
     *                                                                              to
     */
    public function saveBooking(Request $request) {
        BookingController::store($request);

        $booking = new Booking;
        $vehicle = Vehicle::find($request->regoNo);

        $booking->Rego_No = $request->regoNo;
        $booking->Membership_No = $request->memberNo;
        $booking->Booking_Date = Carbon::now();
        $booking->Start_Date = $request->startDate;
        $booking->Start_Klm = $vehicle->Odo_Reading;
        $booking->Return_Date = $request->returnDate;
        $booking->Actual_Return_Date = null;
        $booking->Return_Klm = $vehicle->Odo_Reading + $request->bookingDist;
        $booking->Actual_Return_Klm = null;
        $booking->Fuel_Fee = 50.00;
        $booking->Insurance_Fee = 100.00;
        $booking->Total_exGST = 150.00;
        $booking->GST_Amount = 22.50;
        $booking->Booking_Notes = $request->bookingNotes;
        $booking->Payment_No = 3;
        $booking->Staff_No = 1000;

        $booking->save();

        return redirect('/bookings');
    }

    /**
     * Displays Edit Form for the user to update a booking's details.
     *
     * @param Booking $booking
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View                     Form containing all pre-populated data
     */
    public function displayEditForm(Booking $booking) {
        return view('booking.displayEditForm', ['booking' => $booking]);
    }

    /**
     * Function that is called upon submitting the changes to the booking details during updating.
     *
     * @param Request $request                                                              POST array values from form
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|null  View that the user will be redirected
     *                                                                                      to
     */
    public function updateBooking(Request $request) {
        $booOk = true;
        BookingController::store($request);

        $booking = Booking::find($request->bookingNo);
        $vehicle = Vehicle::find($request->regoNo);

        $booking->Rego_No = $request->regoNo;
        $booking->Membership_No = $request->memberNo;
        $booking->Booking_Date = Carbon::now();
        $booking->Start_Date = $request->startDate;
        $booking->Start_Klm = $vehicle->Odo_Reading;
        $booking->Return_Date = $request->returnDate;
        $booking->Actual_Return_Date = $request->actReturnDate;
        $booking->Return_Klm = $vehicle->Odo_Reading + $request->bookingDist;
        $booking->Actual_Return_Klm = $request->actReturnKlm;
        $booking->Fuel_Fee = 50.00;
        $booking->Insurance_Fee = 100.00;
        $booking->Total_exGST = 150.00;
        $booking->GST_Amount = 22.50;
        $booking->Booking_Notes = $request->bookingNotes;
        $booking->Payment_No = 3;
        $booking->Staff_No = 1000;

        if($booking->Actual_Return_Klm != null && $booking->Actual_Return_Klm < $vehicle->Odo_Reading) {
            $booOk = false;
            $errors = new MessageBag;
            $errors->add("Odometer Logic Error", "The current odometer reading cannot be lower than the starting odometer reading.");
            return back()->withErrors($errors);
        }

        if($booOk) {
            $booking->save();

            $vehicle->Odo_Reading = $request->actReturnKlm;

            $vehicle->save();

            return redirect('/bookings');
        } else {
            return null;
        }
    }

    /**
     * Deletes a selected booking.
     *
     * @param $Booking_No                                                           Booking no of the record that is
     *                                                                              going to be deleted
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector     View that the user will be
     *                                                                              redirected to after the booking has
     *                                                                              been deleted
     */
    public function delete($Booking_No) {
        Booking::findOrFail($Booking_No)->delete();

        return redirect('/bookings');
    }

    /**
     * store() is used to validate form data that the user enters.
     *
     * @param Request $request                                          POST array extracted from the submitted form
     */
    public function store(Request $request) {
        // Validate and store data
        $this->validate($request,[
            'startDate' => 'required|date',
            'returnDate' => 'required|date',
            'actReturnDate' => 'date',
            'bookingDist' => 'required|numeric',
            'actReturnKlm' => 'numeric',
            'bookingNotes' => 'max:300',
        ]);
    }

    /**
     * archiveBooking() was created primarily as a way for the user to archive booking records.
     *
     * @param Booking $booking                                                      Booking number of the record being
     *                                                                              archived
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector     View that the user will be redirected
     *                                                                              to after the action has been completed
     */
    public function archiveBooking(Booking $booking) {
        $archiveBooking = new ArchiveBooking();

        $archiveBooking->Rego_No = $booking->Rego_No;
        $archiveBooking->Membership_No = $booking->Membership_No;
        $archiveBooking->Booking_Date = $booking->Booking_Date;
        $archiveBooking->Start_Date = $booking->Start_Date;
        $archiveBooking->Start_Klm = $booking->Start_Klm;
        $archiveBooking->Return_Date = $booking->Return_Date;
        $archiveBooking->Actual_Return_Date = $booking->Actual_Return_Date;
        $archiveBooking->Return_Klm = $booking->Return_Klm;
        $archiveBooking->Actual_Return_Klm = $booking->Actual_Return_Klm;
        $archiveBooking->Fuel_Fee = $booking->Fuel_Fee;
        $archiveBooking->Insurance_Fee = $booking->Insurance_Fee;
        $archiveBooking->Total_exGST = $booking->Total_exGST;
        $archiveBooking->GST_Amount = $booking->GST_Amount;
        $archiveBooking->Booking_Notes = $booking->Booking_Notes;
        $archiveBooking->Payment_No = $booking->Payment_No;
        $archiveBooking->Staff_No = $booking->Staff_No;

        $archiveBooking->save();

        Booking::findOrFail($booking->Booking_No)->delete();

        return redirect('/bookings');
    }
}
