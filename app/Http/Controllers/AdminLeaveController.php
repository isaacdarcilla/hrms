<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\Rule;
use Inertia\Inertia;
use App\Models\Notification;
use App\Models\Credit;
use App\Models\Leave;
use App\Models\Contact;
use App\Models\EmployeeSetting;
use App\Models\Setting;
use Carbon\Carbon;

class AdminLeaveController extends Controller
{
    public function index() 
    {
        return Inertia::render('Leave/Index', [
            'filters' => Request::all('search', 'trashed'),
            'leaves' => Leave::orderBy('created_at', 'DESC')
                ->filter(Request::only('search', 'trashed'))
                ->paginate()
        ]);
    }

    public function approve($id) {
        $type = Request::input('leave_type');
        $now =  Carbon::now();

        Request::validate([
            'credit_to_be_subtracted' => ['required', 'min:1', 'regex:/^\d+(\.\d{1,4})?$/'],
        ]);

        Leave::find($id)->update([
            'approved_for' => 'Approved',
            'recommendation' => 'Approved',
            'updated_at' => Carbon::now(),
        ]);

        if($type === 'Sick') {
            Credit::create([
                'leave_id' => $id,
                'sick_leave' => '-'.Request::input('credit_to_be_subtracted'),
                'contact_id' => Request::input('contact_id'),
                'leave_number' => Request::input('leave_number'),
                'year' => $now->year,
            ]);
        } else {
            Credit::create([
                'leave_id' => $id,
                'vacation_leave' => '-'.Request::input('credit_to_be_subtracted'),
                'contact_id' => Request::input('contact_id'),
                'leave_number' => Request::input('leave_number'),
                'year' => $now->year,
            ]);
        }

        return Redirect::back()->with('success', 'Leave approved.');
    }

    public function disapprove($id) {
        Request::validate([
            'disapproved_due_to' => ['required', 'min:10'],
        ]);

        Leave::find($id)->update([
            'disapproved_due_to' => Request::input('disapproved_due_to'),
            'recommendation' => 'Disapproved',
            'updated_at' => Carbon::now(),
        ]);

        return Redirect::back()->with('error', 'Leave disapproved.');
    }

    public function form(Leave $leave) {
        return Inertia::render('Sheet/FormLeave', [
            'leave' => $leave,
            'totals' => [
                'vacation' => Credit::where('contact_id', $leave->contact_id)
                                    ->where('year', '=', Carbon::now()->year)
                                    ->sum('vacation_leave'),
                'sick' => Credit::where('contact_id', $leave->contact_id)
                                ->where('year', '=', Carbon::now()->year)
                                ->sum('sick_leave'),
            ],
            'certification' => Credit::select('created_at', 'updated_at')
                                     ->where('contact_id', $leave->contact_id)
                                     ->where('year', '=', Carbon::now()->year)
                                     ->orderBy('created_at', 'DESC')
                                     ->first(),
            'oic' => EmployeeSetting::where('contact_id', $leave->contact_id)
                                    ->orderBy('created_at', 'DESC')
                                    ->first(),
            'hr' => Setting::where('id', 1)->first(),
        ]);
    }
}
