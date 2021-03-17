<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Children;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

class ContactsController extends Controller
{
    public function index()
    {
        return Inertia::render('Contacts/Index', [
            'filters' => Request::all('search', 'trashed'),
            'contacts' => Auth::user()->account->contacts()
                ->with('organization')
                ->orderByName()
                ->filter(Request::only('search', 'trashed'))
                ->paginate()
                ->transform(function ($contact) {
                    return [
                        'id' => $contact->id,
                        'first_name' => $contact->first_name,
                        'middle_name' => $contact->middle_name,
                        'last_name' => $contact->last_name,
                        'name_extension' => $contact->name_extension,
                        'phone' => $contact->phone,
                        'email' => $contact->email,
                        'department' => $contact->department,
                        'status_of_appointment' => $contact->status_of_appointment,
                        'position' => $contact->position,
                        'photo' => $contact->photo,
                        'status' => $contact->status,
                        'deleted_at' => $contact->deleted_at,
                        'organization' => $contact->organization ? $contact->organization->only('name') : null,
                    ];
                }),
        ]);
    }

    public function create()
    {
        return Inertia::render('Contacts/Create', [
            'organizations' => Auth::user()->account
                ->organizations()
                ->orderBy('name')
                ->get()
                ->map
                ->only('id', 'name'),
        ]);
    }

    public function store()
    {
        Auth::user()->account->contacts()->create(
            Request::validate([
                'first_name' => ['required', 'max:25', 'min:2'],
                'last_name' => ['required', 'max:25', 'min:2'],
                'middle_name' => ['required', 'max:25', 'min:2'],
                'email' => ['required', 'max:50', 'email'],
                'phone' => ['required', 'min:11'],
                'name_extension' => ['nullable', 'max:4'],
                'telephone' => ['nullable', 'max:25', 'regex:/^[0-9+]+$/'],
                'department' => ['required', 'max:50'],
                'position' => ['required', 'max:50'],
                'status_of_appointment' => ['required', 'max:50'],
                'sex' => ['required', 'max:10', 'min:4'],
                'height' => ['required', 'max:3', 'regex:/^[0-9.]+$/'],
                'weight' => ['required', 'max:3', 'regex:/^[0-9.]+$/'],
                'birth_date' => ['required', 'min:10', 'date'],
                'birth_place' => ['required', 'max:50'],
                'blood_type' => ['required', 'max:5'],
                'gsis_id' => ['nullable', 'min:11'],
                'sss_id' => ['nullable', 'min:10'],
                'philhealth_id' => ['nullable', 'min:12'],
                'agency_employee_id' => ['nullable', 'max:50'],
                'tin_id' => ['nullable', 'required', 'max:50'],
                'pagibig_id' => ['nullable', 'min:12'],
                'tin_id' => ['nullable', 'min:9'],
                'birth_place' => ['required', 'max:50'],
                'civil_status' => ['required', 'max:25'],
                'citizenship' => ['required', 'max:25'],
                'residential_block' => ['required', 'max:25', 'min:2'],
                'residential_village' => ['nullable', 'max:25', 'min:2'],
                'residential_street' => ['required', 'max:25', 'min:2'],
                'residential_barangay' => ['required', 'max:25', 'min:2'],
                'residential_city' => ['required', 'max:25', 'min:2'],
                'residential_province' => ['required', 'max:25', 'min:2'],
                'residential_zipcode' => ['required', 'max:25', 'min:2', 'regex:/^[0-9.]+$/'],
                'permanent_block' => ['required', 'max:25', 'min:2'],
                'permanent_village' => ['nullable', 'max:25', 'min:2'],
                'permanent_street' => ['required', 'max:25', 'min:2'],
                'permanent_barangay' => ['required', 'max:25', 'min:2'],
                'permanent_city' => ['required', 'max:25', 'min:2'],
                'permanent_province' => ['required', 'max:25', 'min:2'],
                'permanent_zipcode' => ['required', 'max:25', 'min:2', 'regex:/^[0-9.]+$/'],
            ], [
                'gsis_id.min' => 'The GSIS identification must be at least 12 characters.',
                'sss_id.min' => 'The SSS identification must be at least 10 characters.',
                'philhealth_id.min' => 'The TIN identification must be at least 12 characters.',
                'tin_id.min' => 'The PhilHealth identification must be at least 9 characters.',
                'pagibig_id.min' => 'The PAGIBIG identification must be at least 12 characters.',
            ])
        );

        return Redirect::route('employees')->with('success', 'Employee created.');
    }

    public function edit(Contact $contact)
    {
        $family = $contact->backgrounds()->first();

        return Inertia::render('Contacts/Edit', [
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
                ->get() : null,
            'organizations' => Auth::user()->account->organizations()
                ->orderBy('name')
                ->get()
                ->map
                ->only('id', 'name'),
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
    }

    public function sheet() {
        return Inertia::render('Sheet/DataSheet');
    }

    public function update(Contact $contact)
    {
        $contact->update(
            Request::validate([
                'first_name' => ['required', 'max:25', 'min:2'],
                'last_name' => ['required', 'max:25', 'min:2'],
                'middle_name' => ['required', 'max:25', 'min:2'],
                'email' => ['required', 'max:50', 'email'],
                'phone' => ['required', 'min:11'],
                'name_extension' => ['nullable', 'max:4'],
                'telephone' => ['nullable', 'max:25', 'regex:/^[0-9+]+$/'],
                'department' => ['required', 'max:50'],
                'position' => ['required', 'max:50'],
                'status_of_appointment' => ['required', 'max:50'],
                'sex' => ['required', 'max:10', 'min:4'],
                'height' => ['required', 'max:3', 'regex:/^[0-9.]+$/'],
                'weight' => ['required', 'max:3', 'regex:/^[0-9.]+$/'],
                'birth_date' => ['required', 'min:10'],
                'birth_place' => ['required', 'max:50'],
                'blood_type' => ['required', 'max:5'],
                'gsis_id' => ['nullable', 'min:11'],
                'sss_id' => ['nullable', 'min:10'],
                'philhealth_id' => ['nullable', 'min:12'],
                'agency_employee_id' => ['nullable', 'max:50'],
                'tin_id' => ['nullable', 'required', 'max:50'],
                'pagibig_id' => ['nullable', 'min:12'],
                'tin_id' => ['nullable', 'min:9'],
                'birth_place' => ['required', 'max:50'],
                'civil_status' => ['required', 'max:25'],
                'citizenship' => ['required', 'max:25'],
                'residential_block' => ['required', 'max:25', 'min:2'],
                'residential_village' => ['nullable', 'max:25', 'min:2'],
                'residential_street' => ['required', 'max:25', 'min:2'],
                'residential_barangay' => ['required', 'max:25', 'min:2'],
                'residential_city' => ['required', 'max:25', 'min:2'],
                'residential_province' => ['required', 'max:25', 'min:2'],
                'residential_zipcode' => ['required', 'max:25', 'min:2', 'regex:/^[0-9.]+$/'],
                'permanent_block' => ['required', 'max:25', 'min:2'],
                'permanent_village' => ['nullable', 'max:25', 'min:2'],
                'permanent_street' => ['required', 'max:25', 'min:2'],
                'permanent_barangay' => ['required', 'max:25', 'min:2'],
                'permanent_city' => ['required', 'max:25', 'min:2'],
                'permanent_province' => ['required', 'max:25', 'min:2'],
                'permanent_zipcode' => ['required', 'max:25', 'min:2', 'regex:/^[0-9.]+$/'],
            ], [
                'gsis_id.min' => 'The GSIS identification must be at least 12 characters.',
                'sss_id.min' => 'The SSS identification must be at least 10 characters.',
                'philhealth_id.min' => 'The TIN identification must be at least 12 characters.',
                'tin_id.min' => 'The PhilHealth identification must be at least 9 characters.',
                'pagibig_id.min' => 'The PAGIBIG identification must be at least 12 characters.',
            ])
        );

        Notification::create([
            'contact_id' => $contact->id,
            'notification' => 'updated '.Notification::sex($contact->sex).' profile.',
        ]);

        return Redirect::back()->with('success', 'Employee information updated.');
    }

    public function update_photo(Contact $contact)
    {
        Request::validate([
            'photo' => ['required', 'image'],
        ]);

        $contact->update([
            'photo' => Request::file('photo') ? Request::file('photo')->store('photo', 'public') : $contact->photo
        ]);

        Notification::create([
            'contact_id' => $contact->id,
            'notification' => 'updated '.Notification::sex($contact->sex).' photo.',
        ]);

        return Redirect::back()->with('success', 'Employee photo updated.');
    }

    public function update_status(Contact $contact)
    {
        Request::input('status') == "1" ?
            $contact->restore()
            :
            $contact->delete();

        $contact->update([
            'status' => Request::input('status'),
        ]);

        Notification::create([
            'contact_id' => $contact->id,
            'notification' => 'updated '.Notification::sex($contact->sex).' status.',
        ]);

        return Redirect::back()->with('success', 'Employee status updated.');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();

        return Redirect::back()->with('success', 'Contact deleted.');
    }

    public function restore(Contact $contact)
    {
        $contact->restore();

        return Redirect::back()->with('success', 'Contact restored.');
    }
}
