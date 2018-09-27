<?php

namespace App\Http\Controllers;

use App\ArchiveMember;
use Illuminate\Http\Request;

/**
 * @author: David Buttler
 * @version: 1.0
 * @since: 10-11-2017
 *
 * Class ArchiveMemberController
 * @package App\Http\Controllers
 *
 * This .php Controller was made to provide functionality with the archiving of member records.
 */
class ArchiveMemberController extends Controller
{
    /**
     * Returns the View object that contains the archived members.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View         View with an array of archive member
     *                                                                          records
     */
    public function index() {
        $archiveMember = ArchiveMember::orderBy('Archive_Membership_No', 'dsc')->get();

        return view('archiveMember.archiveMembers', ['archiveMembers' => $archiveMember]);
    }

    /**
     * Allows the user to view the details of an archived member.
     *
     * @param $Archive_Membership_No                                            Archive Member number of the record being
     *                                                                          viewed
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View         View with an archive member object
     *                                                                          associated with it
     */
    public function viewArchiveMember($Archive_Membership_No) {
        $archiveMember = ArchiveMember::find($Archive_Membership_No);

        return view('archiveMember.viewArchiveMember', ['archiveMember' => $archiveMember]);
    }
}
