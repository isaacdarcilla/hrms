<?php

namespace App\Http\Controllers\Employee;

use App\Models\Background;
use App\Models\Notification;
use App\Models\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Carbon\Carbon;

class FamilyController extends Controller
{
    public function store(Background $background)
    {
        $background->create(
            Request::validate([
                'contact_id' => ['required'],
                'spouse_first_name' => ['required', 'max:25', 'min:2'],
                'spouse_last_name' => ['required', 'max:25', 'min:2'],
                'spouse_middle_name' => ['required', 'max:25', 'min:2'],
                'spouse_telephone' => ['required', 'min:11'],
                'spouse_name_extension' => ['nullable', 'max:4'],
                'spouse_business_name' => ['nullable', 'max:50'],
                'spouse_business_address' => ['nullable', 'max:50'],
                'father_first_name' => ['required', 'max:25', 'min:2'],
                'father_last_name' => ['required', 'max:25', 'min:2'],
                'father_middle_name' => ['required', 'max:25', 'min:2'],
                'father_name_extension' => ['nullable', 'max:4'],
                'mother_first_name' => ['required', 'max:25', 'min:2'],
                'mother_last_name' => ['required', 'max:25', 'min:2'],
                'mother_middle_name' => ['required', 'max:25', 'min:2'],
            ])
        );

        Notification::create([
            'contact_id' => Request::input('contact_id'),
            'notification' => 'added a family background.',
        ]);

        return Redirect::back()->with('success', 'Family background added.');
    }

    public function update($employee)
    {
        $contact = Contact::find($employee);

        Background::where('contact_id', $employee)->update(
            Request::validate([
                'spouse_first_name' => ['required', 'max:25', 'min:2'],
                'spouse_last_name' => ['required', 'max:25', 'min:2'],
                'spouse_middle_name' => ['required', 'max:25', 'min:2'],
                'spouse_telephone' => ['required', 'min:11'],
                'spouse_name_extension' => ['nullable', 'max:4'],
                'spouse_business_name' => ['nullable', 'max:50'],
                'spouse_business_address' => ['nullable', 'max:50'],
                'father_first_name' => ['required', 'max:25', 'min:2'],
                'father_last_name' => ['required', 'max:25', 'min:2'],
                'father_middle_name' => ['required', 'max:25', 'min:2'],
                'father_name_extension' => ['nullable', 'max:4'],
                'mother_first_name' => ['required', 'max:25', 'min:2'],
                'mother_last_name' => ['required', 'max:25', 'min:2'],
                'mother_middle_name' => ['required', 'max:25', 'min:2'],
            ])
        );

        Notification::create([
            'contact_id' => $contact->id,
            'notification' => 'updated '.Notification::sex($contact->sex).' family background.',
        ]);

        return Redirect::back()->with('success', 'Family background updated.');
    }
}
