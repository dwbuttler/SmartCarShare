<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * @author: David Buttler
 * @version: 1.0
 * @since: 10-11-2017
 *
 * Class StaffController
 * @package App\Http\Controllers
 *
 * StaffController.php was created with the intention of facilitating authentication middleware within the
 * Smart Car Share system.
 */
class StaffController extends Controller
{
    /**
     * StaffController constructor.
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View             Staff Home Page (View)
     */
    public function staffHomePage() {
        return View('staffHomePage');
    }
}
