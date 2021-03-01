<?php

namespace App\Http\Controllers\Employee;

use App\Models\Service;
use App\Models\Notification;
use App\Models\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;

class EligibilityController extends Controller
{
    public function store(Service $service)
    {
        $service->create(
            Request::validate([
                'contact_id' => ['required'],
                'eligibility_name' => ['required', 'max:50', 'min:2'],
                'eligibility_rating' => ['nullable', 'max:50', 'min:2', 'regex:/^[0-9.]+$/'],
                'eligibility_date_of_exam' => ['required', 'max:50', 'min:2', 'date'],
                'eligibility_place_of_exam' => ['required', 'max:50', 'min:2'],
                'eligibility_license_number' => ['nullable', 'max:50', 'min:2'],
                'eligibility_license_expiration' => ['nullable', 'max:50', 'min:2', 'date'],
            ])
        );

        Notification::create([
            'contact_id' => Request::input('contact_id'),
            'notification' => 'added an eligibility.',
        ]);

        return Redirect::back()->with('success', 'Eligibility added.');
    }

    public function update($service)
    {
        $contact = Service::find($service);

        Service::where('id', $service)->update(
            Request::validate([
                'eligibility_name' => ['required', 'max:50', 'min:2'],
                'eligibility_rating' => ['nullable', 'max:50', 'min:2', 'regex:/^[0-9.]+$/'],
                'eligibility_date_of_exam' => ['required', 'max:50', 'min:2', 'date'],
                'eligibility_place_of_exam' => ['required', 'max:50', 'min:2'],
                'eligibility_license_number' => ['nullable', 'max:50', 'min:2'],
                'eligibility_license_expiration' => ['nullable', 'max:50', 'min:2', 'date'],
            ])
        );
        
        $employee = Contact::where('id', $contact->contact_id)->first();

        Notification::create([
            'contact_id' => $contact->contact_id,
            'notification' => 'updated '.Notification::sex($employee->sex).' eligibility.',
        ]);

        return Redirect::back()->with('success', 'Eligibility updated.');
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return Redirect::back()->with('success', 'Eligibility deleted.');
    }
}
