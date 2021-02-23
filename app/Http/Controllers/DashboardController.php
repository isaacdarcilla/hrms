<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\Contact;
use App\Models\Job;
use App\Models\Applicant;
use App\Models\User;
use App\Models\Notice;
use App\Models\Task;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return Inertia::render('Dashboard/Index',[
            'total' => [
                'employees' => Contact::count(),
                'jobs' => Job::count(),
                'applicants' => Applicant::count(),
                'staffs' => User::count(),
                'tasks' => Task::where('user_id', $user->id)->where('cleared_at', NULL)->count(),
            ],
            'notices' => Notice::orderBy('created_at', 'DESC')->take(3)->get(),
            'jobs' => Job::orderBy('created_at', 'DESC')->take(3)->get(),
            'tasks' => Task::where('user_id', $user->id)->orderBy('created_at', 'DESC')->get(),
        ]);
    }
}
