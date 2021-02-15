<?php

namespace App\Http\Controllers\Employee;

use App\Models\Service;
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
                'eligibility_place_of_exam' => ['required', 'max:50', 'min:2', 'date'],
                'eligibility_license_number' => ['nullable', 'max:50', 'min:2'],
                'eligibility_license_expiration' => ['nullable', 'max:50', 'min:2', 'date'],
            ])
        );

        return Redirect::back()->with('success', 'Eligibility added.');
    }

    public function update($service)
    {
        Service::where('id', $service)->update(
            Request::validate([
                'eligibility_name' => ['required', 'max:50', 'min:2'],
                'eligibility_rating' => ['nullable', 'max:50', 'min:2', 'regex:/^[0-9.]+$/'],
                'eligibility_date_of_exam' => ['required', 'max:50', 'min:2', 'date'],
                'eligibility_place_of_exam' => ['required', 'max:50', 'min:2', 'date'],
                'eligibility_license_number' => ['nullable', 'max:50', 'min:2'],
                'eligibility_license_expiration' => ['nullable', 'max:50', 'min:2', 'date'],
            ])
        );

        return Redirect::back()->with('success', 'Eligibility updated.');
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return Redirect::back()->with('success', 'Eligibility deleted.');
    }
}
