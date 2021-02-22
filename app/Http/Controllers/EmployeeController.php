<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Job;
use App\Models\Applicant;
use App\Models\User;
use App\Models\Notice;
use App\Models\Children;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Auth;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee =  Auth::guard('employee')->user();

        if($employee)
            return Inertia::render('EmployeePanel/Employee', [
                'employee' => $employee,
                'total' => [
                    'employees' => Contact::count(),
                    'jobs' => Job::count(),
                    'applicants' => Applicant::count(),
                    'staffs' => User::count(),
                ],
                'notices' => Notice::orderBy('created_at', 'DESC')->take(5)->get(),
                'jobs' => Job::orderBy('created_at', 'DESC')->take(5)->get(),
            ]);
        else 
            return redirect()->route('login.employee');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function employee_logout() 
    {
        Auth::guard('employee')->logout();

        return redirect()->route('login.employee');
    }
}
