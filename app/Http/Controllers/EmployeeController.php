<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Credit;
use App\Models\Job;
use App\Models\Applicant;
use App\Models\User;
use App\Models\Task;
use App\Models\Notice;
use Illuminate\Http\Request;
use Inertia\Inertia;
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

    public function profile(Contact $contact)
    {
        $employee =  Auth::guard('employee')->user();
        $family = $contact->backgrounds()->first();

        if($employee)
            return Inertia::render('EmployeePanel/Profile', [
                'employee' => $employee,
                'notices' => Notice::orderBy('created_at', 'DESC')->take(5)->get(),
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
                    ->get() : null,
                'educations' => $contact->educations()
                    ->get(),
                'experiences' => $contact->experiences()
                    ->get(),
                'eligibilities' => $contact->services()
                    ->get(),
                'volunteers' => $contact->volunteers()
                    ->get(),
                'trainings' => $contact->trainings()
                    ->get(),
                'skills' => $contact->skills()
                    ->get(),
                'recognitions' => $contact->recognitions()
                    ->get(),
                'memberships' => $contact->memberships()
                    ->get(),
                'documents' => $contact->documents()
                    ->get(),

            ]);
        else
            return redirect()->route('login.employee');
    }

    public function employee_logout()
    {
        Auth::guard('employee')->logout();

        return redirect()->route('login.employee');
    }
}
