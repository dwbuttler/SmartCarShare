<?php
/**
 * Student name:
 * Student id:
 * Date: 01.01.2017
 * Project:
 * Version: 1.0
 * File: StaffMiddleware.php
 */
namespace App\Http\Middleware;
use Closure;
/**
 * Class StaffMiddleware
 * Helper class to help deciding what to do if user is Staff or not
 * Found on: http://laravel.io/forum/02-17-2015-laravel-5-routes-restricting-based-on-usertype
 * @package App\Http\Middleware
 */
class StaffMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->user() == null || $request->user()->role != 'staff')
        {
            return redirect('home');
        }
        return $next($request);
    }
}