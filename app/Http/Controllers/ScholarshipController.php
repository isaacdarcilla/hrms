<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\Rule;
use Inertia\Inertia;
use App\Models\Scholarship;

class ScholarshipController extends Controller
{
    public function index() {
        $employee =  Auth::guard('employee')->user();

        if($employee)
            return Inertia::render('EmployeePanel/Scholarship/Index', [
                'employee' => $employee,
                'filters' => Request::all('search'),
                'scholars' => Scholarship::where('contact_id', auth()->guard('employee')->user()->id)
                                ->with('contact')
                                ->filter(Request::only('search'))
                                ->orderBy('created_at', 'DESC')
                                ->paginate(),
            ]);
        else
            return redirect()->route('login.employee');
    }

    public function create() {
        $employee =  Auth::guard('employee')->user();

        if($employee)
            return Inertia::render('EmployeePanel/Scholarship/Create', [
                'employee' => $employee,
            ]);
        else
            return redirect()->route('login.employee');
    }

    public function store(Request $request) {

    }
}
