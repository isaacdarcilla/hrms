<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Job;
use App\Models\Applicant;
use App\Models\User;
use App\Models\Notice;
use App\Models\Task;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
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
                    'tasks' => Task::where('contact_id', $employee->id)->where('cleared_at', NULL)->count(),
                ],
                'notices' => Notice::orderBy('created_at', 'DESC')->take(5)->get(),
                'jobs' => Job::orderBy('created_at', 'DESC')->take(5)->get(),
                'tasks' => Task::where('contact_id', $employee->id)->orderBy('created_at', 'DESC')->get(),
            ]);
        else
            return redirect()->route('login.employee');
    }

    public function employee_logout()
    {
        Auth::guard('employee')->logout();

        return redirect()->route('login.employee');
    }
}
