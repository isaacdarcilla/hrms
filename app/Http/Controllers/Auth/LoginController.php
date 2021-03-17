<?php

namespace App\Http\Controllers\Auth;

use App\Models\Contact;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Str;
use Session;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Show the application's login form.
     *
     * @return \Inertia\Response
     */
    public function showLoginForm()
    {
        return Inertia::render('Auth/Login');
    }

    /**
     * Show the application's login form.
     *
     * @return \Inertia\Response
     */
    public function showLoginFormEmployee()
    {
        return Inertia::render('Auth/EmployeeLogin');
    }

    public function loginEmployee(Request $request)
    {
        $credentials = [
            filter_var($request->input('email'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::guard('employee')->attempt($credentials)) {
            return Redirect::route('employee.dashboard');
        } else {
            return Inertia::render('Auth/EmployeeLogin', [
                'errors' => [
                    'message' => 'These credentials do not match our records.'
                ],
            ]);
        }
    }
}