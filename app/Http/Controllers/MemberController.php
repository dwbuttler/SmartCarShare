<?php

namespace App\Http\Controllers;

use App\ArchiveMember;
use App\Member;
use App\MemberMembership;
use Carbon\Carbon;
use http\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;

/**
 * @author: David Buttler
 * @version: 1.0
 * @since: 10-11-2017
 *
 * Class MemberController
 * @package App\Http\Controllers
 *
 * MemberController.php contains all the functionality to facilitate the handling of Member records in the Smart Car
 * Share system.
 */
class MemberController extends Controller
{
    /**
     * Returns the View object that contains the members.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View     View with an array of member records
     */
    function index() {
        $member = Member::orderBy('Membership_No', 'dsc')->get();
        $memberMembership = MemberMembership::orderBy('Membership_No', 'dsc')->get();

        return view('member.members', ['members' => $member])->with('memberMemberships', $memberMembership);
    }

    /**
     * Allows the user to view the details of a member.
     *
     * @param Member $member                                                Member number of the record being viewed
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View     View with a member object associated with it
     */
    public function viewMember(Member $member) {
        return view('member.viewMember', ['member' => $member]);
    }

    /**
     * Displays Form for the user to create a new member.
     *
     * @return $this                                                        Form containing all pre-populated data
     */
    public function displayForm() {
        return view('member.displayForm');
    }

    /**
     * Function that is called upon submitting the information for the new member record.
     *
     * @param Request $request                                                      POST array values from form
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector     View that the user will be redirected
     *                                                                              to
     */
    public function saveMember(Request $request) {
        MemberController::store($request);
        $booOk = true;

        $member = new Member;

        try {
            $member->Date_Received = Carbon::now();
            $member->Last_Name = $request->lastName;
            $member->First_Name = $request->firstName;
            $member->Address = $request->address;
            $member->Phone_No = $request->phoneNo;
            $member->Email_Add = $request->email;
            $member->Type = $request->type;
            $member->Licence_No = $request->licenceNo;
            $member->Licence_Exp = $request->licenceExp;
            $member->Terms_Accepted = 1;
            $member->Terms_File_Loc =  "Terms/Mem".$request->licenceNo."_TC.pdf";
            $member->Acceptance_Date = Carbon::now();
            $member->OAuth = md5($request->password);

            $member->save();

            $member = Member::orderBy('Membership_No', 'dsc')->first();

            $memberMembership = new MemberMembership;

            $memberMembership->Membership_No = $member->Membership_No;
            $memberMembership->MemType_Id = $request->type;
            $memberMembership->Date_Joined = Carbon::now();
            $memberMembership->Last_Renewed = null;
            $memberMembership->Expiry_Date = Carbon::now()->addYear(1);
            $memberMembership->Status = "Not Approved";
            $memberMembership->SmartCard_Issued = 0;
            $memberMembership->SmartCard_No = null;

            $memberMembership->save();
        } catch(\Exception $e) {
            $booOk = false;
            $errors = new MessageBag;
            $errors->add("Unique Key Integrity Error", "Please enter a Licence No that isn't shared by another member.");
            return back()->withErrors($errors);
        }

        if($booOk)
            return redirect('/members');
        else
            return null;
    }

    /**
     * Displays Edit Form for the user to update a member's details.
     *
     * @param Member $member
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View                     Form containing all pre-populated data
     */
    public function displayEditForm(Member $member) {
        return view('member.displayEditForm', ['member' => $member]);
    }

    /**
     * Function that is called upon submitting the changes to the member details during updating.
     *
     * @param Request $request                                                              POST array values from form
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|null  View that the user will be redirected
     *                                                                                      to
     */
    public function updateMember(Request $request) {
        MemberController::store($request);

        $member = Member::find($request->memberNo);

        $member->Last_Name = $request->lastName;
        $member->First_Name = $request->firstName;
        $member->Address = $request->address;
        $member->Phone_No = $request->phoneNo;
        $member->Email_Add = $request->email;
        $member->Type = $request->type;
        $member->Licence_exp = $request->licenceExp;
        $member->OAuth = md5($request->password);

        $member->save();

        $memberMembership = MemberMembership::find($request->memberNo);

        $memberMembership->MemType_Id = $request->type;

        $memberMembership->save();

        return redirect('/members');
    }

    /**
     * Function that is used to make a member record approved.
     *
     * @param $Membership_No                                                        Membership number of the record
     *                                                                              being approved
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector     Return View that will appear at the
     *                                                                              end of approveMember()
     */
    public function approveMember($Membership_No) {
        $memberMembership = MemberMembership::find($Membership_No);

        $memberMembership->Status = "Approved";
        $memberMembership->SmartCard_Issued = 1;
        $memberMembership->SmartCard_No = $Membership_No;

        $memberMembership->save();

        return redirect('/members');
    }

    /**
     * Deletes a selected Member and MemberMembership.
     *
     * @param $Membership_No                                                        Membership no of the record that is
     *                                                                              going to be deleted
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector     View that the user will be
     *                                                                              redirected to after the booking has
     *                                                                              been deleted
     */
    public function delete($Membership_No) {
        try {
            Member::findOrFail($Membership_No)->delete();
            MemberMembership::findOrFail($Membership_No)->delete();
        } catch(\Illuminate\Database\QueryException $e) {

        }

        return redirect('/members');
    }

    /**
     * Displays the form that contains the necessary fields to change a Member's password.
     *
     * @param $Membership_No
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function displayEditPasswordForm($Membership_No) {
        $member = Member::find($Membership_No);

        return view('member.editPassword', ['member' => $member]);
    }

    /**
     * Commits the password form data to change the password of a Member record.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function editPassword(Request $request) {
        MemberController::storePassword($request);

        $member = Member::find($request->memberNo);

        $member->OAuth = md5($request->conPassword);

        $member->save();

        return redirect('/members');
    }

    /**
     * store() is used to validate form data that the user enters.
     *
     * @param Request $request                                          POST array extracted from the submitted form
     */
    public function store(Request $request) {
        // Validate and store data
        $this->validate($request,[
            'firstName' => 'required|max:30',
            'lastName' => 'required|max:50',
            'address' => 'required',
            'phoneNo' => 'required|numeric',
            'email' => 'required|email',
            'licenceNo' => 'required|digits:9',
            'licenceExp' => 'required|date',
        ]);
    }

    /**
     * storePassword() is used to validate password form data that the user enters.
     *
     * @param Request $request                                          POST array extracted from the submitted form
     */
    public function storePassword(Request $request) {
        // Validate and store data
        $this->validate($request, [
            'password' => 'required|min:10',
            'conPassword' => 'required|same:password',
        ]);
    }

    /**
     * archiveMember() was created primarily as a way for the user to archive member records.
     *
     * @param Member $member                                                        Member number of the record being
     *                                                                              archived
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector     View that the user will be redirected
     *                                                                              to after the action has been completed
     */
    public function archiveMember(Member $member) {
        $archiveMember = new ArchiveMember;

        $archiveMember->Date_Received = $member->Date_Received;
        $archiveMember->Last_Name = $member->Last_Name;
        $archiveMember->First_Name = $member->First_Name;
        $archiveMember->Address = $member->Address;
        $archiveMember->Phone_No = $member->Phone_No;
        $archiveMember->Email_Add = $member->Email_Add;
        $archiveMember->Type = $member->Type;
        $archiveMember->Licence_No = $member->Licence_No;
        $archiveMember->Licence_Exp = $member->Licence_Exp;
        $archiveMember->Terms_Accepted = $member->Terms_Accepted;
        $archiveMember->Terms_File_Loc = $member->Terms_File_Loc;
        $archiveMember->Acceptance_Date = $member->Acceptance_Date;
        $archiveMember->OAuth = $member->OAuth;

        $archiveMember->save();

        MemberMembership::findOrFail($member->Membership_No)->delete();
        Member::findOrFail($member->Membership_No)->delete();

        return redirect('/members');
    }
}
