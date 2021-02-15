<?php

namespace App\Http\Controllers\Employee;

use App\Models\Volunteer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;

class VolunteerController extends Controller
{
 	public function store(Volunteer $volunteer)
    {
        $volunteer->create(
            Request::validate([
                'contact_id' => ['required'],
		        'volunteers_organization' => ['required', 'max:50', 'min:4'],
		        'volunteers_from' => ['required', 'max:50', 'min:10', 'date'],
		        'volunteers_to' => ['required', 'max:50', 'min:10', 'date'],
		        'volunteers_number_of_hours' => ['required', 'max:50', 'min:1', 'regex:/^[0-9]+$/'],
		        'volunteers_nature_of_work' => ['required', 'max:50', 'min:4'],
            ])
        );

        return Redirect::back()->with('success', 'Voluntary work experience added.');
    }

    public function update($volunteer)
    {
        Volunteer::where('id', $volunteer)->update(
            Request::validate([
		        'volunteers_organization' => ['required', 'max:50', 'min:4'],
		        'volunteers_from' => ['required', 'max:50', 'min:10', 'date'],
		        'volunteers_to' => ['required', 'max:50', 'min:10', 'date'],
		        'volunteers_number_of_hours' => ['required', 'max:50', 'min:1', 'regex:/^[0-9]+$/'],
		        'volunteers_nature_of_work' => ['required', 'max:50', 'min:4'],
            ])
        );

        return Redirect::back()->with('success', 'Voluntary work experience added.');
    }

    public function destroy(Volunteer $volunteer)
    {
        $volunteer->delete();

        return Redirect::back()->with('success', 'Volunteer deleted.');
    }
}
