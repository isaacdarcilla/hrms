<?php

namespace App\Http\Controllers\Employee;

use App\Models\Education;
use App\Models\Notification;
use App\Models\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;

class EducationController extends Controller
{
    public function destroy(Education $education)
    {
        $education->delete();

        return Redirect::back()->with('success', 'Education deleted.');
    }

    public function store(Education $education)
    {
        $education->create(
            Request::validate([
                'contact_id' => ['required'],
                'education_level' => ['required', 'max:50', 'min:2'],
                'education_school_name' => ['required', 'max:50', 'min:2'],
                'education_course' => ['required', 'max:50', 'min:2'],
                'from' => ['required', 'max:25', 'min:10', 'date'],
                'to' => ['required', 'max:25', 'min:10', 'date'],
                'education_highest_level_earned' => ['nullable', 'max:50', 'min:2'],
                'education_year_graduated' => ['required', 'max:50', 'min:2'],
                'education_honors_received' => ['required', 'max:50', 'min:2'],
            ])
        );

        Notification::create([
            'contact_id' => Request::input('contact_id'),
            'notification' => 'added an educational background.',
        ]);

        return Redirect::back()->with('success', 'Educational background added.');
    }

    public function update($education)
    {
        $contact = Education::find($education);

        Education::where('id', $education)->update(
            Request::validate([
                'education_level' => ['required', 'max:50', 'min:2'],
                'education_school_name' => ['required', 'max:50', 'min:2'],
                'education_course' => ['required', 'max:50', 'min:2'],
                'from' => ['required', 'max:25', 'min:2', 'date'],
                'to' => ['required', 'max:25', 'min:2', 'date'],
                'education_highest_level_earned' => ['nullable', 'max:50', 'min:2'],
                'education_year_graduated' => ['required', 'max:50', 'min:2'],
                'education_honors_received' => ['required', 'max:50', 'min:2'],
            ])
        );

        $employee = Contact::where('id', $contact->contact_id)->first();

        Notification::create([
            'contact_id' => $contact->contact_id,
            'notification' => 'updated '.Notification::sex($employee->sex).' educational background.',
        ]);

        return Redirect::back()->with('success', 'Educational background added.');
    }
}
