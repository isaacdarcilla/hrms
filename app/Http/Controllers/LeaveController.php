<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\Rule;
use Inertia\Inertia;
use App\Models\Leave;

class LeaveController extends Controller
{
    public function index() {
        $employee =  Auth::guard('employee')->user();

        if($employee)
            return Inertia::render('EmployeePanel/Leave/Index', [
                'employee' => $employee,
                'filters' => Request::all('search', 'trashed'),
                'leaves' => Leave::where('contact_id', auth()->guard('employee')->user())->paginate(),
            ]);
        else
            return redirect()->route('login.employee');
    }
}
