<?php

namespace App\Http\Controllers;

use App\Location;
use App\Staff;
use Illuminate\Http\Request;

/**
 * @author: David Buttler
 * @version: 1.0
 * @since: 10-11-2017
 *
 * Class LocationController
 * @package App\Http\Controllers
 *
 * This class allows the user to add/view/update/delete location records in the Smart Car Share system.
 */
class LocationController extends Controller
{
    /**
     * Returns the View object that contains the locations.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View     View with an array of location records
     */
    function index() {
        $location = Location::orderBy('Location_Id', 'dsc')->get();

        return view('location.locations', ['locations' => $location]);
    }

    /**
     * Allows the user to view the details of a location.
     *
     * @param Location $location                                            Location number of the record being viewed
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View     View with a location object associated with it
     */
    public function viewLocation(Location $location) {
        return view('location.viewLocation', ['location' => $location]);
    }

    /**
     * Displays Form for the user to create a new location.
     *
     * @return $this                                                        Form containing all pre-populated data
     */
    public function displayForm() {
        $staffMembers = Staff::orderBy('Staff_No', 'dsc')->get();

        return view('location.displayForm')->with('staffMembers', $staffMembers);
    }

    /**
     * Function that is called upon submitting the information for the new location record.
     *
     * @param Request $request                                                      POST array values from form
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector     View that the user will be redirected
     *                                                                              to
     */
    public function saveLocation(Request $request) {
        LocationController::store($request);

        $location = new Location;

        $location->Council_Name = $request->councilName;
        $location->Contact_Name = $request->contactName;
        $location->Phone_No = $request->phoneNo;
        $location->Email_Add = $request->email;
        $location->Address = $request->address;
        $location->Parking_Levy_Amt = $request->parkingLevy;
        $location->Staff_No = $request->staffAssign;

        $location->save();

        return redirect('/locations');
    }

    /**
     * Displays Edit Form for the user to update a location's details.
     *
     * @param Location $location
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View                     Form containing all pre-populated data
     */
    public function displayEditForm(Location $location) {
        $staffMembers = Staff::orderBy('Staff_No', 'dsc')->get();

        return view('location.displayEditForm', ['location' => $location])->with('staffMembers', $staffMembers);
    }

    /**
     * Function that is called upon submitting the changes to the location details during updating.
     *
     * @param Request $request                                                              POST array values from form
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|null  View that the user will be redirected
     *                                                                                      to
     */
    public function updateLocation(Request $request) {
        LocationController::store($request);

        $location = Location::find($request->locationId);

        $location->Council_Name = $request->councilName;
        $location->Contact_Name = $request->contactName;
        $location->Phone_No = $request->phoneNo;
        $location->Email_Add = $request->email;
        $location->Address = $request->address;
        $location->Parking_Levy_Amt = $request->parkingLevy;
        $location->Staff_No = $request->staffAssign;

        $location->save();

        return redirect('/locations');
    }

    /**
     * Deletes a selected booking.
     *
     * @param $Location_Id                                                          Location no of the record that is
     *                                                                              going to be deleted
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector     View that the user will be
     *                                                                              redirected to after the location has
     *                                                                              been deleted
     */
    public function delete($Location_Id) {
        try {
            Location::findOrFail($Location_Id)->delete();
        } catch(\Illuminate\Database\QueryException $e) {

        }

        return redirect('/locations');
    }

    /**
     * store() is used to validate form data that the user enters.
     *
     * @param Request $request                                          POST array extracted from the submitted form
     */
    public function store(Request $request) {
        // Validate and store data
        $this->validate($request,[
            'councilName' => 'required|max:30',
            'contactName' => 'required|max:50',
            'phoneNo' => 'required|numeric',
            'email' => 'required|email',
            'address' => 'required',
            'parkingLevy' => 'required|numeric',
        ]);
    }
}
