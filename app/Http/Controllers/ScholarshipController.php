<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\Rule;
use Inertia\Inertia;
use App\Models\Contact;
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
                                ->with('office')
                                ->filter(Request::only('search'))
                                ->orderBy('created_at', 'DESC')
                                ->paginate(),
            ]);
        else
            return redirect()->route('login.employee');
    }

    public function edit($id) {
        $employee =  Auth::guard('employee')->user();

        if($employee)
            return Inertia::render('EmployeePanel/Scholarship/Edit', [
                'employee' => $employee,
                'filters' => Request::all('search'),
                'scholars' => Scholarship::where('contact_id', auth()->guard('employee')->user()->id)
                                ->with('contact')
                                ->with('office')
                                ->filter(Request::only('search'))
                                ->orderBy('created_at', 'DESC')
                                ->paginate(),
                'scholar' => Scholarship::whereContactId(auth()->guard('employee')->user()->id)
                                ->whereId($id)
                                ->with('contact')
                                ->with('office')
                                ->first(),
            ]);
        else
            return redirect()->route('login.employee');
    }

    public function form($id) {
        $employee =  Auth::guard('employee')->user();

        if($employee)
            return Inertia::render('EmployeePanel/Scholarship/Form', [
                'employee' => $employee,
                'filters' => Request::all('search'),
                'scholars' => Scholarship::where('contact_id', auth()->guard('employee')->user()->id)
                                ->with('contact')
                                ->with('office')
                                ->filter(Request::only('search'))
                                ->orderBy('created_at', 'DESC')
                                ->paginate(),
                'scholar' => Scholarship::whereContactId(auth()->guard('employee')->user()->id)
                                ->whereId($id)
                                ->with('contact')
                                ->with('office')
                                ->first(),
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

    public function store() {
        $scholarship = Request::input('scholarship_type');
        $plan = Request::input('plan');
        $before = Request::input('recipient_before');

        Request::validate([
            'type_of_disability' => 'nullable',
            'highest_educational_attainment' => 'required',
            'school_last_attended' => 'required|min:3',
            'school_address' => 'required|min:3',
            'degree_program' => 'required|min:3',
            'weighted_average' => 'required|min:1|regex:/^[0-9.]+$/',
            'scholarship_type' =>  'required',
            'duration_number_of_months' => $scholarship == '1' || $scholarship == '2' || $scholarship == '3' ? 'required|regex:/^[0-9]+$/' : 'nullable',
            'start_inclusive_dates' =>  $scholarship == '1' || $scholarship == '2' || $scholarship == '3' ? 'required' : 'nullable',
            'end_inclusive_dates' =>  $scholarship == '1' || $scholarship == '2' || $scholarship == '3' ? 'required|after:start_inclusive_dates' : 'nullable',
            'sponsoring_agency' =>  $scholarship == '2' ? 'required' : 'nullable',
            'degree_type' => $scholarship == '4' ? 'required' : 'nullable',
            'degree_name' => $scholarship == '4' ? 'required|min:3' : 'nullable',
            'plan' => $scholarship == '4' ? 'required' : 'nullable',
            'grantee_agency' => $plan == '1' ? 'required|min:3' : 'nullable',
            'school_intended_to_enroll' => $plan == '1' || $plan == '2' ? 'required|min:3' : 'nullable',
            'intended_school_address' => $plan == '1' || $plan == '2' ? 'required|min:3' : 'nullable',
            'duration_number_of_years' => $plan == '1' || $plan == '2' || $plan == '3' ? 'required|regex:/^[0-9]+$/' : 'nullable',
            'scholarship_start_inclusive_dates' => $plan == '1' || $plan == '2' || $plan == '3' ? 'required' : 'nullable',
            'scholarship_end_inclusive_dates' => $plan == '1' || $plan == '2'|| $plan == '3' ? 'required|after:scholarship_start_inclusive_dates' : 'nullable',
            'school_type' => $plan == '2' ? 'required' : 'nullable',
            'thesis_or_dissertation' => $plan == '4' ? 'required|min:3' : 'nullable',
            'thesis_or_dissertation_name' => $plan == '4' ? 'required|min:3' : 'nullable',
            'recipient_before' => 'required',
            'sponsoring_agency_before' => $before == 'Yes' ? 'required|min:3' : 'nullable',
            'start_period_of_grant' => $before == 'Yes' ? 'required' : 'nullable',
            'end_period_of_grant' => $before == 'Yes' ? 'required|after:start_period_of_grant' : 'nullable',
            'reason_of_applying' => 'required|min:12',
        ]);

        Contact::whereId(Request::input('contact_id'))->update([
            'type_of_disability' => Request::input('type_of_disability'),
            'highest_educational_attainment' => Request::input('highest_educational_attainment'),
            'school_last_attended' => Request::input('school_last_attended'),
            'school_address' => Request::input('school_address'),
            'degree_program' => Request::input('degree_program'),
            'weighted_average' => Request::input('weighted_average'),
        ]);

        Scholarship::create([
            'contact_id' => Request::input('contact_id'),
            'office_id' => Request::input('office_id'),
            'status' => 'Pending',
            'scholarship_number' => mt_rand(100000, 999999),
            'scholarship_type' => Request::input('scholarship_type'),
            'duration_number_of_months' => Request::input('duration_number_of_months'),
            'inclusive_dates' => date('M d, Y', strtotime(Request::input('start_inclusive_dates'))).' - '.date('M d, Y', strtotime(Request::input('end_inclusive_dates'))),
            'sponsoring_agency' => Request::input('sponsoring_agency'),
            'degree_type' => Request::input('degree_type'),
            'degree_name' => Request::input('degree_name'),
            'plan' => Request::input('plan'),
            'grantee_agency' => Request::input('grantee_agency'),
            'school_intended_to_enroll' => Request::input('school_intended_to_enroll'),
            'school_address' => Request::input('intended_school_address'),
            'duration_number_of_years' => Request::input('duration_number_of_years'),
            'scholarship_inclusive_dates' => date('M d, Y', strtotime(Request::input('scholarship_start_inclusive_dates'))).' - '.date('M d, Y', strtotime(Request::input('scholarship_end_inclusive_dates'))),
            'school_type' => Request::input('school_type'),
            'thesis_or_dissertation' => Request::input('thesis_or_dissertation'),
            'thesis_or_dissertation_name' => Request::input('thesis_or_dissertation_name'),
            'recipient_before' => Request::input('recipient_before'),
            'sponsoring_agency_before' => Request::input('sponsoring_agency_before'),
            'period_of_grant' => date('M d, Y', strtotime(Request::input('start_period_of_grant'))).' - '.date('M d, Y', strtotime(Request::input('end_period_of_grant'))),
            'reason_of_applying' => Request::input('reason_of_applying'),
        ]);

        return Redirect::back()->with('success', 'Successfully submitted application.');
    }

    public function destroy($id)
    {
        Scholarship::find($id)->delete();

        return Redirect::back()->with('success', 'Scholarship deleted.');
    }

    public function update($id) {
        $scholarship = Request::input('scholarship_type');
        $plan = Request::input('plan');
        $before = Request::input('recipient_before');

        Request::validate([
            'type_of_disability' => 'nullable',
            'highest_educational_attainment' => 'required',
            'school_last_attended' => 'required|min:3',
            'school_address' => 'required|min:3',
            'degree_program' => 'required|min:3',
            'weighted_average' => 'required|min:1|regex:/^[0-9.]+$/',
            'scholarship_type' =>  'required',
            'duration_number_of_months' => $scholarship == '1' || $scholarship == '2' || $scholarship == '3' ? 'required|regex:/^[0-9]+$/' : 'nullable',
            'start_inclusive_dates' =>  $scholarship == '1' || $scholarship == '2' || $scholarship == '3' ? 'required' : 'nullable',
            'end_inclusive_dates' =>  $scholarship == '1' || $scholarship == '2' || $scholarship == '3' ? 'required|after:start_inclusive_dates' : 'nullable',
            'sponsoring_agency' =>  $scholarship == '2' ? 'required' : 'nullable',
            'degree_type' => $scholarship == '4' ? 'required' : 'nullable',
            'degree_name' => $scholarship == '4' ? 'required|min:3' : 'nullable',
            'plan' => $scholarship == '4' ? 'required' : 'nullable',
            'grantee_agency' => $plan == '1' ? 'required|min:3' : 'nullable',
            'school_intended_to_enroll' => $plan == '1' || $plan == '2' ? 'required|min:3' : 'nullable',
            'intended_school_address' => $plan == '1' || $plan == '2' ? 'required|min:3' : 'nullable',
            'duration_number_of_years' => $plan == '1' || $plan == '2' || $plan == '3' ? 'required|regex:/^[0-9]+$/' : 'nullable',
            'scholarship_start_inclusive_dates' => $plan == '1' || $plan == '2' || $plan == '3' ? 'required' : 'nullable',
            'scholarship_end_inclusive_dates' => $plan == '1' || $plan == '2'|| $plan == '3' ? 'required|after:scholarship_start_inclusive_dates' : 'nullable',
            'school_type' => $plan == '2' ? 'required' : 'nullable',
            'thesis_or_dissertation' => $plan == '4' ? 'required|min:3' : 'nullable',
            'thesis_or_dissertation_name' => $plan == '4' ? 'required|min:3' : 'nullable',
            'recipient_before' => 'required',
            'sponsoring_agency_before' => $before == 'Yes' ? 'required|min:3' : 'nullable',
            'start_period_of_grant' => $before == 'Yes' ? 'required' : 'nullable',
            'end_period_of_grant' => $before == 'Yes' ? 'required|after:start_period_of_grant' : 'nullable',
            'reason_of_applying' => 'required|min:12',
        ]);

        Contact::whereId(Request::input('contact_id'))->update([
            'type_of_disability' => Request::input('type_of_disability'),
            'highest_educational_attainment' => Request::input('highest_educational_attainment'),
            'school_last_attended' => Request::input('school_last_attended'),
            'school_address' => Request::input('school_address'),
            'degree_program' => Request::input('degree_program'),
            'weighted_average' => Request::input('weighted_average'),
        ]);

        Scholarship::whereId($id)->update([
            'contact_id' => Request::input('contact_id'),
            'office_id' => Request::input('office_id'),
            'status' => 'Pending',
            'scholarship_number' => mt_rand(100000, 999999),
            'scholarship_type' => Request::input('scholarship_type'),
            'duration_number_of_months' => Request::input('duration_number_of_months'),
            'inclusive_dates' => date('M d, Y', strtotime(Request::input('start_inclusive_dates'))).' - '.date('M d, Y', strtotime(Request::input('end_inclusive_dates'))),
            'sponsoring_agency' => Request::input('sponsoring_agency'),
            'degree_type' => Request::input('degree_type'),
            'degree_name' => Request::input('degree_name'),
            'plan' => Request::input('plan'),
            'grantee_agency' => Request::input('grantee_agency'),
            'school_intended_to_enroll' => Request::input('school_intended_to_enroll'),
            'school_address' => Request::input('intended_school_address'),
            'duration_number_of_years' => Request::input('duration_number_of_years'),
            'scholarship_inclusive_dates' => date('M d, Y', strtotime(Request::input('scholarship_start_inclusive_dates'))).' - '.date('M d, Y', strtotime(Request::input('scholarship_end_inclusive_dates'))),
            'school_type' => Request::input('school_type'),
            'thesis_or_dissertation' => Request::input('thesis_or_dissertation'),
            'thesis_or_dissertation_name' => Request::input('thesis_or_dissertation_name'),
            'recipient_before' => Request::input('recipient_before'),
            'sponsoring_agency_before' => Request::input('sponsoring_agency_before'),
            'period_of_grant' => date('M d, Y', strtotime(Request::input('start_period_of_grant'))).' - '.date('M d, Y', strtotime(Request::input('end_period_of_grant'))),
            'reason_of_applying' => Request::input('reason_of_applying'),
        ]);

        return Redirect::back()->with('success', 'Successfully updated application.');
    }

    public function documents($id) {
        $employee =  Auth::guard('employee')->user();

        if($employee)
            return Inertia::render('EmployeePanel/Scholarship/Documents', [
                'employee' => $employee,
                'filters' => Request::all('search'),
                'scholars' => Scholarship::where('contact_id', auth()->guard('employee')->user()->id)
                                ->with('contact')
                                ->with('office')
                                ->filter(Request::only('search'))
                                ->orderBy('created_at', 'DESC')
                                ->paginate(),
                'scholar' => Scholarship::whereContactId(auth()->guard('employee')->user()->id)
                                ->whereId($id)
                                ->with('contact')
                                ->with('office')
                                ->first(),
            ]);
        else
            return redirect()->route('login.employee');
    }
}
