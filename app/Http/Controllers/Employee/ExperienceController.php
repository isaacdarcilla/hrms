<?php

namespace App\Http\Controllers\Employee;

use App\Models\Experience;
use App\Models\Notification;
use App\Models\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;

class ExperienceController extends Controller
{
    public function destroy(Experience $experience)
    {
        $experience->delete();

        return Redirect::back()->with('success', 'Experience deleted.');
    }

    public function store(Experience $experience)
    {
        $experience->create(
            Request::validate([
                'contact_id' => ['required'],
                'experiences_from' => ['required', 'max:50', 'min:10', 'date'],
		        'experiences_to' => ['required', 'max:50', 'min:10', 'date'],
		        'experiences_position' => ['required', 'max:50', 'min:4'],
		        'experiences_company' => ['required', 'max:50', 'min:4'],
		        'experiences_monthly_salary' => ['nullable', 'max:50', 'min:4', 'regex:/^[0-9]+$/'],
		        'experiences_salary_grade' => ['nullable', 'max:50', 'min:2', 'regex:/^[0-9]+$/'],
		        'experiences_status_of_appointment' => ['required', 'max:50', 'min:4'],
		        'experiences_government' => ['required'],
            ])
        );

        Notification::create([
            'contact_id' => Request::input('contact_id'),
            'notification' => 'added a work experience.',
        ]);

        return Redirect::back()->with('success', 'Work experience added.');
    }

    public function update($experience)
    {
        $contact = Experience::find($experience);

        Experience::where('id', $experience)->update(
            Request::validate([
                'experiences_from' => ['required', 'max:50', 'min:10', 'date'],
		        'experiences_to' => ['required', 'max:50', 'min:10', 'date'],
		        'experiences_position' => ['required', 'max:50', 'min:4'],
		        'experiences_company' => ['required', 'max:50', 'min:4'],
		        'experiences_monthly_salary' => ['nullable', 'max:50', 'min:4', 'regex:/^[0-9]+$/'],
		        'experiences_salary_grade' => ['nullable', 'max:50', 'min:2', 'regex:/^[0-9]+$/'],
		        'experiences_status_of_appointment' => ['required', 'max:50', 'min:4'],
		        'experiences_government' => ['required'],
            ])
        );

        $employee = Contact::where('id', $contact->contact_id)->first();

        Notification::create([
            'contact_id' => $contact->contact_id,
            'notification' => 'updated '.Notification::sex($employee->sex).' work experience.',
        ]);

        return Redirect::back()->with('success', 'Work experience updated.');
    }
}
