<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\MessageBag;

/**
 * @author: David Buttler
 * @version: 1.0
 * @since: 10-11-2017
 *
 * Class AccountController
 * @package App\Http\Controllers
 *
 * AccountController.php contains all the functions that deal with user accounts.
 */
class AccountController extends Controller
{
    /**
     * Function that is called when a Staff member views their account details.
     *
     * @param $id           Staff Identification number
     * @return $this        Return View object with relevant form and data
     */
    function index($id) {
        // Find User record with the given Staff Id
        $user = User::find($id);

        return view('account.accounts')->with('user', $user);
    }

    /**
     * displayPasswordPage() is a function that creates the starting conditions
     * for a user to change their password.
     *
     * @param $id           Staff Identification number
     * @return $this        Return View object with relevant form and data
     */
    function displayPasswordPage($id) {
        return view('account.changePassword')->with('id', $id);
    }

    /**
     * Submits form data to change a Staff Member's account details.
     *
     * @param Request $request                                                      POST array containing form values
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector     View that will appear upon completion
     *                                                                              of the function
     */
    function updateDetails(Request $request) {
        AccountController::storeUpdate($request);

        $user = User::find($request->accountId);

        $user->name = $request->acctName;
        $user->email = $request->email;
        $user->save();

        return redirect('/StaffHP');
    }

    /**
     * Changes a Staff Member account password.
     *
     * @param Request $request                                                          POST array containing form values
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector   View that will appear upon completion
     *                                                                                  of the function
     */
    function changePassword(Request $request) {
        AccountController::storePassword($request);

        $user = User::find($request->accountId);

        if(Hash::check($request->txtCurrentPassword, $user->getAuthPassword())) {
            $user->password = bcrypt($request->txtNewPassword);
            $user->save();

            return redirect('/StaffHP');
        } else {
            $errors = new MessageBag;
            $errors->add("Current Password Error", "The current password provided does not match our records.");
            return back()->withErrors($errors);
        }
    }

    /**
     * Function that validates 'account update password' data entered by the user.
     *
     * @param Request $request      POST array containing form values
     */
    public function storePassword(Request $request) {
        $this->validate($request,[
            'txtCurrentPassword' => 'required',
            'txtNewPassword' => 'required',
            'txtConfirmPassword' => 'required|same:txtNewPassword',
        ]);
    }

    /**
     * Function that validates 'account update' data entered by the user.
     *
     * @param Request $request      POST array containing form values
     */
    public function storeUpdate(Request $request) {
        $this->validate($request,[
            'acctName' => 'required|alpha',
            'email' => 'required|email',
        ]);
    }
}
