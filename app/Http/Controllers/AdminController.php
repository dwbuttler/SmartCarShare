<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * @author: David Buttler
 * @version: 1.0
 * @since: 10-11-2017
 *
 * Class AdminController
 * @package App\Http\Controllers
 *
 * AdminController.php was created with the intention of facilitating authentication middleware within the
 * Smart Car Share system.
 */
class AdminController extends Controller
{
    /**
     * AdminController constructor.
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View     Admin Homepage View
     */
    public function adminHomePage(){
        return View('adminHomePage');
    }
}
