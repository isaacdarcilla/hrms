<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Credit;
use App\Models\Leave;
use App\Models\Children;
use App\Models\EmployeeSetting;
use App\Models\Setting;
use App\Models\Profile;
use App\Models\Job;
use App\Models\Applicant;
use App\Models\User;
use App\Models\Task;
use App\Models\Notice;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use App\Models\Office;
use Carbon\Carbon;
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

    public function credit(Contact $contact) {
        $employee =  Auth::guard('employee')->user();

        if($employee)
            return Inertia::render('EmployeePanel/Credit', [
                'filters' => Request::all('search', 'trashed'),
                'credits' => $contact->credit()
                    ->with('user')
                    ->where('year', '=', Carbon::now()->year)
                    ->orderBy('created_at', 'DESC')
                    ->filter(Request::only('search', 'trashed'))
                    ->paginate(),
                'totals' => [
                    'vacation' => $contact->credit()->sum('vacation_leave'),
                    'sick' => $contact->credit()->sum('sick_leave'),
                ],
                'employee' => $employee,
            ]);
        else
            return redirect()->route('login.employee');
    }

    public function teaching_profile($id, $type) {
        $employee =  Auth::guard('employee')->user();

        if($employee)
            return Inertia::render('EmployeePanel/TeachingNonProfile', [
                'employee' => $employee,
                'contact' => Contact::with('office')->find($id),
                'profile' => Profile::where('contact_id', $id)->where('type', $type)->first(),
                'type' => ucwords($type),
            ]);
        else
            return redirect()->route('login.employee');
    }

    public function profile_edit_work($id, $type) {
        $employee =  Auth::guard('employee')->user();

        if($employee)
            return Inertia::render('EmployeePanel/Edit/EditWork', [
                'employee' => $employee,
                'contact' => Contact::with('office')->find($id),
                'profile' => Profile::where('contact_id', $id)->where('type', $type)->first(),
                'type' => ucwords($type),
            ]);
        else
            return redirect()->route('login.employee');
    }

    public function profile_edit_education($id, $type) {
        $employee =  Auth::guard('employee')->user();

        if($employee)
            return Inertia::render('EmployeePanel/Edit/EditEducation', [
                'employee' => $employee,
                'contact' => Contact::with('office')->find($id),
                'profile' => Profile::where('contact_id', $id)->where('type', $type)->first(),
                'type' => ucwords($type),
            ]);
        else
            return redirect()->route('login.employee');
    }

    public function cto_credit(Contact $contact) {
        $employee =  Auth::guard('employee')->user();

        if($employee)
            return Inertia::render('EmployeePanel/Cto', [
                'filters' => Request::all('search', 'trashed'),
                'credits' => $contact->ctocredit()
                    ->with('user')
                    ->where('year', '=', Carbon::now()->year)
                    ->orderBy('created_at', 'DESC')
                    ->filter(Request::only('search', 'trashed'))
                    ->paginate(),
                'totals' => [
                    'cto' => $contact->ctocredit()->sum('cto_leave'),
                    'spl' => $contact->ctocredit()->sum('spl_leave'),
                ],
                'employee' => $employee,
            ]);
        else
            return redirect()->route('login.employee');
    }

    public function service_record(Contact $contact) 
    {
        $employee =  Auth::guard('employee')->user();

        if($employee)
            return Inertia::render('EmployeePanel/ServiceRecord', [
                'filters' => Request::all('search', 'trashed'),
                'employee' => $contact,
                'service_records' => $contact->service_record()->orderBy('created_at', 'DESC')
                    ->with('contact')
                    ->with('user')
                    ->paginate()
            ]);
        else
            return redirect()->route('login.employee');
    }

    public function formEmployee(Leave $leave) {
        $employee =  Auth::guard('employee')->user();

        if($employee)
            return Inertia::render('Sheet/FormLeaveEmployee', [
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
                'employee' => $employee,
            ]);
        else
            return redirect()->route('login.employee');
    }

    public function formEmployeeNew(Leave $leave) {
        $employee =  Auth::guard('employee')->user();

        if($employee)
            return Inertia::render('Sheet/FormLeaveEmployeeNew', [
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
                'employee' => $employee,
            ]);
        else
            return redirect()->route('login.employee');
    }

    public function profile(Contact $contact)
    {
        $employee =  Auth::guard('employee')->user();
        $family = $contact->backgrounds()->first();

        if($employee)
            return Inertia::render('EmployeePanel/Profile', [
                'employee' => $employee,
                'notices' => Notice::orderBy('created_at', 'DESC')->take(5)->get(),
                'offices' => Office::get(),
                'contact' => [
                    'id' => $contact->id,
                    'first_name' => $contact->first_name,
                    'middle_name' => $contact->middle_name,
                    'last_name' => $contact->last_name,
                    'name_extension' => $contact->name_extension,
                    'photo' => $contact->photo,
                    'birth_date' => $contact->birth_date,
                    'birth_place' => $contact->birth_place,
                    'sex' => $contact->sex,
                    'civil_status' => $contact->civil_status,
                    'department' => $contact->department,
                    'position' => $contact->position,
                    'status_of_appointment' => $contact->status_of_appointment,
                    'height' => $contact->height,
                    'weight' => $contact->weight,
                    'status' => $contact->status,
                    'blood_type' => $contact->blood_type,
                    'gsis_id' => $contact->gsis_id,
                    'pagibig_id' => $contact->pagibig_id,
                    'philhealth_id' => $contact->philhealth_id,
                    'sss_id' => $contact->sss_id,
                    'tin_id' => $contact->tin_id,
                    'agency_employee_id' => $contact->agency_employee_id,
                    'citizenship' => $contact->citizenship,
                    'email' => $contact->email,
                    'username' => $contact->username,
                    'phone' => $contact->phone,
                    'telephone' => $contact->telephone,
                    'permanent_block' => $contact->permanent_block,
                    'permanent_street' => $contact->permanent_street,
                    'permanent_village' => $contact->permanent_village,
                    'permanent_barangay' => $contact->permanent_barangay,
                    'permanent_city' => $contact->permanent_city,
                    'permanent_province' => $contact->permanent_province,
                    'permanent_zipcode' => $contact->permanent_zipcode,
                    'residential_block' => $contact->residential_block,
                    'residential_street' => $contact->residential_street,
                    'residential_village' => $contact->residential_village,
                    'residential_barangay' => $contact->residential_barangay,
                    'residential_city' => $contact->residential_city,
                    'residential_province' => $contact->residential_province,
                    'residential_zipcode' => $contact->residential_zipcode,
                    'deleted_at' => $contact->deleted_at,
                ],
                'family' => $family,
                'childrens' => !empty($family->id) ? Children::where('background_id', $family->id)
                    ->orderBy('created_at', 'DESC')->get() : null,
                'educations' => $contact->educations()
                    ->orderBy('created_at', 'DESC')->get(),
                'experiences' => $contact->experiences()
                    ->orderBy('created_at', 'DESC')->get(),
                'eligibilities' => $contact->services()
                    ->orderBy('created_at', 'DESC')->get(),
                'volunteers' => $contact->volunteers()
                    ->orderBy('created_at', 'DESC')->get(),
                'trainings' => $contact->trainings()
                    ->orderBy('created_at', 'DESC')->get(),
                'skills' => $contact->skills()
                    ->orderBy('created_at', 'DESC')->get(),
                'recognitions' => $contact->recognitions()
                    ->orderBy('created_at', 'DESC')->get(),
                'memberships' => $contact->memberships()
                    ->orderBy('created_at', 'DESC')->get(),
                'documents' => $contact->documents()
                    ->orderBy('created_at', 'DESC')->get(),
                'references' => $contact->reference()
                    ->orderBy('created_at', 'DESC')->get(),
                'governments' => $contact->government()
                    ->orderBy('created_at', 'DESC')->get(),

            ]);
        else
            return redirect()->route('login.employee');
    }

    public function password($id)
    {
        $employee =  Auth::guard('employee')->user();
        $isUsername = Request::input('isUsername');
        
        if($employee) 
        {
            if ($isUsername) 
            {
                Request::validate([
                    'username' => ['required', 'min:6', 'max:25', 'string', 'unique:contacts', 'alpha_dash'],
                    'password' => ['required', 'min:8', 'max:25', 'confirmed'],
                    'password_confirmation' => ['required']
                ]);
                
                Contact::find($id)->update([
                    'username' => Request::input('username'),
                    'password' => Hash::make(Request::input('password')),
                ]);

                return Redirect::back()->with('success', 'Username and password updated.');
            }  else 
            {
                Request::validate([
                    'password' => ['required', 'min:8', 'max:25', 'confirmed'],
                    'password_confirmation' => ['required']
                ]);
                
                Contact::find($id)->update([
                    'password' => Hash::make(Request::input('password')),
                ]);

                return Redirect::back()->with('success', 'Password updated.');
            }
        }
    }

    public function employee_logout()
    {
        Auth::guard('employee')->logout();

        return redirect()->route('login.employee');
    }

    public function pds($contact) 
    {
        $employee =  Auth::guard('employee')->user();

        if($employee)
            return Inertia::render('EmployeePanel/Pds/Pds', [
                'employee' => $employee,
            ]);
        else
            return redirect()->route('login.employee');
    }
}
