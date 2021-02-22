<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Contact;
use App\Models\Job;
use App\Models\Applicant;
use App\Models\User;

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
            ]
        ]);
    }
}
