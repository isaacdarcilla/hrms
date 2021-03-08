<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\Rule;
use Inertia\Inertia;
use App\Models\Notification;
use App\Models\Leave;

class LeaveController extends Controller
{
    public function index() {
        $employee =  Auth::guard('employee')->user();

        if($employee)
            return Inertia::render('EmployeePanel/Leave/Index', [
                'employee' => $employee,
                'filters' => Request::all('search', 'trashed'),
                'leaves' => Leave::where('contact_id', auth()->guard('employee')->user()->id)
                                ->filter(Request::only('search', 'trashed'))
                                ->paginate(),
            ]);
        else
            return redirect()->route('login.employee');
    }
    
    public function store(Leave $leave) {
        $employee =  Auth::guard('employee')->user();

        if($employee) { 
            $leave->create(
                Request::validate([
                    'contact_id' => ['required'],
                    'leave_number' => ['required', 'max:50', 'min:4'],
                    'agency' => ['required', 'max:50', 'min:4'],
                    'last_name' => ['required', 'max:50', 'min:1'],
                    'first_name' => ['required', 'max:50', 'min:1'],
                    'middle_initial' => ['required', 'max:50', 'min:1'],
                    'date_of_filing' => ['required', 'max:50', 'min:4', 'date'],
                    'position' => ['required', 'max:50', 'min:4'],
                    'monthly_salary' => ['required', 'max:50', 'min:4', 'regex:/^[0-9]+$/'],
                    'type_of_leave' => ['required', 'max:50', 'min:2'],
                    'vacation_leave_location' => ['nullable', 'max:50', 'min:4'],
                    'sick_leave_location' => ['nullable', 'max:50', 'min:4'],
                    'number_of_working_days' => ['required', 'max:50', 'min:1'],
                    'start_of_inclusive_date' => ['required', 'min:1'],
                    'end_of_inclusive_date' => ['nullable', 'max:50', 'min:4'],
                    'commutation' => ['nullable', 'max:50', 'min:4'],
                    'officer_in_charge_name' => ['nullable', 'max:50', 'min:4'],
                    'officer_in_charge_position' => ['nullable', 'max:50', 'min:4'],
                    'office' => ['nullable', 'max:50', 'min:4'],
                ])
            );

            Notification::create([
                'contact_id' => Request::input('contact_id'),
                'notification' => 'applied a leave.',
            ]);

            return Redirect::back()->with('success', 'Leave filed.');
        }
        else {
            return redirect()->route('login.employee');
        }
    }

    public function destroy($id)
    {
        Leave::find($id)->delete();

        return Redirect::back()->with('success', 'Leave deleted.');
    }
}
