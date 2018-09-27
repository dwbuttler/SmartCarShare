<?php

namespace App\Http\Controllers;

use App\Location;
use App\Staff;
use App\Vehicle;
use App\VehicleType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;

/**
 * @author: David Buttler
 * @version: 1.0
 * @since: 10-11-2017
 *
 * Class VehicleController
 * @package App\Http\Controllers
 *
 * VehicleController.php contains all the functionality to facilitate the handling of Vehicle records in the Smart Car
 * Share system.
 */
class VehicleController extends Controller
{
    /**
     * Returns the View object that contains the vehicles.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View     View with an array of vehicle records
     */
    function index() {
        $vehicle = Vehicle::orderBy('Rego_No', 'dsc')->get();
        $vehicleType = VehicleType::orderBy('Type_Id', 'dsc')->get();

        return view('vehicle.vehicles', ['vehicles' => $vehicle])->with('vehicleTypes', $vehicleType);
    }

    /**
     * Allows the user to view the details of a vehicle.
     *
     * @param Vehicle $vehicle                                              Registration number of the record being viewed
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View     View with a member object associated with it
     */
    public function viewVehicle(Vehicle $vehicle) {
        return view('vehicle.viewVehicle', ['vehicle' => $vehicle]);
    }

    /**
     * Displays Form for the user to create a new vehicle.
     *
     * @return $this                                                        Form containing all pre-populated data
     */
    public function displayForm() {
        $staffMembers = Staff::orderBy('Staff_No', 'dsc')->get();
        $locations = Location::orderBy('Location_Id', 'dsc')->get();

        return view('vehicle.displayForm')->with('staffMembers', $staffMembers)->with('locations', $locations);
    }

    /**
     * Function that is called upon submitting the information for the new vehicle record.
     *
     * @param Request $request                                                      POST array values from form
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector     View that the user will be redirected
     *                                                                              to
     */
    public function saveVehicle(Request $request) {
        VehicleController::store($request);
        $booOk = true;

        $vehicle = new Vehicle;
        $vehicleType = new VehicleType;

        try {
            $vehicleType->Make = $request->make;
            $vehicleType->Model = $request->model;
            $vehicleType->Eng_Cap = $request->engCap;
            $vehicleType->Body_Type = $request->bodyType;
            $vehicleType->Colour = $request->colour;

            $vehicleType->save();

            $vehicleType = VehicleType::orderBy('Type_Id', 'dsc')->first();

            $vehicle->Rego_No = $request->regoNo;
            $vehicle->Type_Id = $vehicleType->Type_Id;
            $vehicle->VIN_No = $request->vinNo;
            $vehicle->Class = $request->bodyType;
            $vehicle->Odo_Reading = $request->odoReading;
            $vehicle->Year = $request->makeYear;
            $vehicle->Location_Id = $request->location;
            $vehicle->Date_Acquired = $request->dateAcquired;
            $vehicle->Date_Disposed = null;
            $vehicle->Staff_No = $request->staff;

            $vehicle->save();
        } catch(\Exception $e) {
            $booOk = false;
            $vehicleType->delete();
            $errors = new MessageBag;
            $errors->add("Primary Key Integrity Error", "Please enter a Rego No that hasn't been used by another vehicle.");
            return back()->withErrors($errors);
        }

        if($booOk)
            return redirect('/vehicles');
        else
            return null;
    }

    /**
     * Displays Edit Form for the user to update a vehicle's details.
     *
     * @param Vehicle $vehicle
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View                     Form containing all pre-populated data
     */
    public function displayEditForm(Vehicle $vehicle) {
        $staffMembers = Staff::orderBy('Staff_No', 'dsc')->get();
        $locations = Location::orderBy('Location_Id', 'dsc')->get();

        return view('vehicle.displayEditForm', ['vehicle' => $vehicle])->with('staffMembers', $staffMembers)->with('locations', $locations);
    }

    /**
     * Function that is called upon submitting the changes to the vehicle details during updating.
     *
     * @param Request $request                                                              POST array values from form
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|null  View that the user will be redirected
     *                                                                                      to
     */
    public function updateVehicle(Request $request) {
        VehicleController::storeUpdate($request);

        $vehicle = Vehicle::find($request->regoNo);

        $vehicle->Rego_No = $request->regoNo;
        $vehicle->Type_Id = $request->typeId;
        $vehicle->VIN_No = $request->vinNo;
        $vehicle->Class = $request->class;
        $vehicle->Odo_Reading = $request->odoReading;
        $vehicle->Year = $request->makeYear;
        $vehicle->Location_Id = $request->location;
        $vehicle->Date_Acquired = $request->dateAcquired;
        $vehicle->Date_Disposed = $request->dateDisposed;
        $vehicle->Staff_No = $request->staff;

        $vehicle->save();

        return redirect('/vehicles');
    }

    /**
     * Deletes a selected Vehicle.
     *
     * @param $Rego_No                                                              Registration no of the record that is
     *                                                                              going to be deleted
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector     View that the user will be
     *                                                                              redirected to after the vehicle has
     *                                                                              been deleted
     */
    public function delete($Rego_No) {
        try {
            $vehicle = Vehicle::find($Rego_No);
        } catch(\Illuminate\Database\QueryException $e) {

        }

        $vehicle->Date_Disposed = Carbon::now();
        $vehicle->save();

        return redirect('/vehicles');
    }

    /**
     * store() is used to validate form data that the user enters.
     *
     * @param Request $request                                          POST array extracted from the submitted form
     */
    public function store(Request $request) {
        // Validate and store data
        $this->validate($request,[
            'regoNo' => 'required|min:6|max:6',
            'vinNo' => 'required|min:17|max:17',
            'make' => 'required|max:20',
            'model' => 'required|max:30',
            'engCap' => 'required|numeric',
            'bodyType' => 'required|max:30',
            'odoReading' => 'required|numeric',
            'makeYear' => 'required|numeric',
            'dateAcquired' => 'required|date',
            'colour' => 'required|max:20',
        ]);
    }

    /**
     * storeUpdate() is used to validate form data that the user enters.
     *
     * @param Request $request                                          POST array extracted from the submitted form
     */
    public function storeUpdate(Request $request) {
        $this->validate($request,[
            'odoReading' => 'required|numeric',
            'makeYear' => 'required|numeric',
        ]);
    }
}
