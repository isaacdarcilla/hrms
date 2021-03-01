<?php

namespace App\Http\Controllers\Employee;

use App\Models\Skill;
use App\Models\Recognition;
use App\Models\Membership;
use App\Models\Notification;
use App\Models\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;

class OtherInformationController extends Controller
{
    public function store(Skill $skill)
    {
        $skill->create(
            Request::validate([
                'contact_id' => ['required'],
                'skills_name' => ['required', 'max:50', 'min:4'],
            ])
        );

        Notification::create([
            'contact_id' => Request::input('contact_id'),
            'notification' => 'added a skill.',
        ]);

        return Redirect::back()->with('success', 'Skill added.');
    }

    public function update($skill)
    {
        $contact = Skill::find($skill);

        Skill::where('id', $skill)->update(
            Request::validate([
                'skills_name' => ['required', 'max:50', 'min:4'],
            ])
        );

        $employee = Contact::where('id', $contact->contact_id)->first();

        Notification::create([
            'contact_id' => $contact->contact_id,
            'notification' => 'updated '.Notification::sex($employee->sex).' skill.',
        ]);

        return Redirect::back()->with('success', 'Skill updated.');
    }

    public function destroy_skill(Skill $skill)
    {
        $skill->delete();

        return Redirect::back()->with('success', 'Skill deleted.');
    }

    public function store_recognition(Recognition $recognition)
    {
        $recognition->create(
            Request::validate([
                'contact_id' => ['required'],
                'recognitions_name' => ['required', 'max:50', 'min:4'],
            ])
        );

        Notification::create([
            'contact_id' => Request::input('contact_id'),
            'notification' => 'added a recognition.',
        ]);

        return Redirect::back()->with('success', 'Recognition added.');
    }

    public function update_recognition($recognition)
    {
        $contact = Recognition::find($recognition);

        Recognition::where('id', $recognition)->update(
            Request::validate([
                'recognitions_name' => ['required', 'max:50', 'min:4'],
            ])
        );

        $employee = Contact::where('id', $contact->contact_id)->first();

        Notification::create([
            'contact_id' => $contact->contact_id,
            'notification' => 'updated '.Notification::sex($employee->sex).' recognition.',
        ]);

        return Redirect::back()->with('success', 'Recognition updated.');
    }

    public function store_membership(Membership $membership)
    {
        $membership->create(
            Request::validate([
                'contact_id' => ['required'],
                'memberships_name' => ['required', 'max:50', 'min:4'],
            ])
        );

        Notification::create([
            'contact_id' => Request::input('contact_id'),
            'notification' => 'added a membership.',
        ]);

        return Redirect::back()->with('success', 'Membership added.');
    }

    public function update_membership($membership)
    {
        $contact = Membership::find($membership);

        Membership::where('id', $membership)->update(
            Request::validate([
                'memberships_name' => ['required', 'max:50', 'min:4'],
            ])
        );

        $employee = Contact::where('id', $contact->contact_id)->first();

        Notification::create([
            'contact_id' => $contact->contact_id,
            'notification' => 'updated '.Notification::sex($employee->sex).' membership.',
        ]);

        return Redirect::back()->with('success', 'Membership updated.');
    }

    public function destroy_recognition(Recognition $recognition)
    {
        $recognition->delete();

        return Redirect::back()->with('success', 'Recognition deleted.');
    }

    public function destroy_membership(Membership $membership)
    {
        $membership->delete();

        return Redirect::back()->with('success', 'Membership deleted.');
    }
}
