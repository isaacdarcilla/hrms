<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Contact;
use App\Models\Job;
use App\Models\Applicant;
use App\Models\User;
use App\Models\Notice;

class DashboardController extends Controller
{
    public function index()
    {
        return Inertia::render('Dashboard/Index',[
            'total' => [
                'employees' => Contact::count(),
                'jobs' => Job::count(),
                'applicants' => Applicant::count(),
                'staffs' => User::count(),
            ],
            'notices' => Notice::orderBy('created_at', 'DESC')->take(3)->get(),
            'jobs' => Job::orderBy('created_at', 'DESC')->take(3)->get(),
        ]);
    }
}
