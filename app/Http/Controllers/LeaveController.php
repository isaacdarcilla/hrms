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
use App\Models\Credit;
use App\Models\EmployeeSetting;
use Carbon\Carbon;

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
                                ->orderBy('created_at', 'DESC')
                                ->paginate(),
                'totals' => [
                    'vacation' => Credit::where('year', '=', Carbon::now()->year)
                                ->where('contact_id', auth()->guard('employee')->user()->id)
                                ->sum('vacation_leave'),
                    'sick' => Credit::where('year', '=', Carbon::now()->year)
                                ->where('contact_id', auth()->guard('employee')->user()->id)
                                ->sum('sick_leave'),
                ]
            ]);
        else
            return redirect()->route('login.employee');
    }
    
    public function store(Leave $leave, EmployeeSetting $employee_setting) {
        $employee =  Auth::guard('employee')->user();
        $days = Request::input('number_of_working_days');
        $hasSetting = $employee_setting->where('contact_id', $employee->id)->first();

        if($employee) { 

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
                'start_of_inclusive_date' => ['required', 'min:'.$days],
                'end_of_inclusive_date' => ['nullable', 'max:50', 'min:4'],
                'commutation' => ['nullable', 'max:50', 'min:4'],
                'officer_in_charge' => ['required', 'max:50', 'min:4'],	
                'officer_in_charge_position' => ['required', 'max:50', 'min:4'],	
                'department' => ['required', 'max:50', 'min:4'],	
            ]);

            Leave::create([
                'contact_id' => Request::input('contact_id'),
                'leave_number' => Request::input('leave_number'),
                'agency' => ucwords(Request::input('agency')),
                'last_name' => ucwords(Request::input('last_name')),
                'first_name' => ucwords(Request::input('first_name')),
                'middle_initial' => strtoupper(Request::input('middle_initial')),
                'date_of_filing' => Request::input('date_of_filing'),
                'position' => ucwords(Request::input('position')),
                'monthly_salary' => Request::input('monthly_salary'),
                'type_of_leave' => Request::input('type_of_leave'),
                'vacation_leave_location' => Request::input('vacation_leave_location'),
                'sick_leave_location' => Request::input('sick_leave_location'),
                'number_of_working_days' => Request::input('number_of_working_days'),
                'start_of_inclusive_date' => Request::input('start_of_inclusive_date'),
                'end_of_inclusive_date' => Request::input('end_of_inclusive_date'),
                'commutation' => Request::input('commutation'),
            ]);
            
            if(!$hasSetting) {
                EmployeeSetting::create([
                    'contact_id' => Request::input('contact_id'),
                    'officer_in_charge' => ucwords(Request::input('officer_in_charge')),
                    'officer_in_charge_position' => ucwords(Request::input('officer_in_charge_position')),	
                    'department' => ucwords(Request::input('department')),
                ]);
            }

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
