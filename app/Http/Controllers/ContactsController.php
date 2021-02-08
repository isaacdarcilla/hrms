<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Children;
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
                        'name' => $contact->name,
                        'phone' => $contact->phone,
                        'email' => $contact->email,
                        'department' => $contact->department,
                        'status_of_appointment' => $contact->status_of_appointment,
                        'position' => $contact->position,
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
                'first_name' => ['required', 'max:50'],
                'last_name' => ['required', 'max:50'],
                'organization_id' => ['nullable', Rule::exists('organizations', 'id')->where(function ($query) {
                    $query->where('account_id', Auth::user()->account_id);
                })],
                'email' => ['nullable', 'max:50', 'email'],
                'phone' => ['nullable', 'max:50'],
                'address' => ['nullable', 'max:150'],
                'city' => ['nullable', 'max:50'],
                'region' => ['nullable', 'max:50'],
                'country' => ['nullable', 'max:2'],
                'postal_code' => ['nullable', 'max:25'],
            ])
        );

        return Redirect::route('contacts')->with('success', 'Contact created.');
    }

    public function edit(Contact $contact)
    {
        $family = $contact->backgrounds()->first();
        $childrens = Children::find($family->id);

        return Inertia::render('Contacts/Edit', [
            'contact' => [
                'id' => $contact->id,
                'first_name' => $contact->first_name,
                'middle_name' => $contact->middle_name,
                'last_name' => $contact->last_name,
                'name_extension' => $contact->name_extension,
                'birth_date' => $contact->birth_date,
                'birth_place' => $contact->birth_place,
                'sex' => $contact->sex,
                'civil_status' => $contact->civil_status,
                'height' => $contact->height,
                'weight' => $contact->weight,
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
            'childrens' => $childrens,
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
        ]);
    }

    public function update(Contact $contact)
    {
        $contact->update(
            Request::validate([
                'first_name' => ['required', 'max:50'],
                'last_name' => ['required', 'max:50'],
                'organization_id' => ['nullable', Rule::exists('organizations', 'id')->where(function ($query) {
                    $query->where('account_id', Auth::user()->account_id);
                })],
                'email' => ['nullable', 'max:50', 'email'],
                'phone' => ['nullable', 'max:50'],
                'address' => ['nullable', 'max:150'],
                'city' => ['nullable', 'max:50'],
                'region' => ['nullable', 'max:50'],
                'country' => ['nullable', 'max:2'],
                'postal_code' => ['nullable', 'max:25'],
            ])
        );

        return Redirect::back()->with('success', 'Employee information updated.');
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
