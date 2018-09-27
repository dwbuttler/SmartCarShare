<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * @author: David Buttler
 * @version: 1.0
 * @since: 10-11-2017
 *
 * Class RolesController
 * @package App\Http\Controllers
 *
 * This class was created to handle authentication levels (Staff and Admin) on the Smart Car Share system.
 */
class RolesController extends Controller
{
    /**
     * RolesController constructor.
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Diverts users to different homepages depending on their authentication level.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|
     * \Illuminate\View\View                        View containing the homepage for the selected user
     */
    function index() {
        if (Auth::user()->role == 'admin') {
            return redirect('/AdminHP');
        } else if(Auth::user()->role == 'staff') {
            return redirect('/StaffHP');
        }

        return view('home');
    }
}
