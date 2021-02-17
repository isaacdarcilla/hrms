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
        $employee = Contact::where('email', $request->input('email'))
                ->where('password', md5($request->input('password')))
                ->first();
        $token = md5(Str::random(10));

        if(!$employee) {
            return Inertia::render('Auth/EmployeeLogin', [
                'errors' => [
                    'message' => 'These credentials do not match our records.',
                ],
            ]);
        } else {
            $employee->update([
                'token' => $token,
            ]);

            session(['token' => $token]);

            return redirect()->route('employee.dashboard');
        }
    }
}
