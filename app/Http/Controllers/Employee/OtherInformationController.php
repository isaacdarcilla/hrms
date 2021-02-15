<?php

namespace App\Http\Controllers\Employee;

use App\Models\Skill;
use App\Models\Recognition;
use App\Models\Membership;
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

        return Redirect::back()->with('success', 'Skill added.');
    }

    public function update($skill)
    {
        Skill::where('id', $skill)->update(
            Request::validate([
                'skills_name' => ['required', 'max:50', 'min:4'],
            ])
        );

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

        return Redirect::back()->with('success', 'Recognition added.');
    }

    public function update_recognition($recognition)
    {
        Recognition::where('id', $recognition)->update(
            Request::validate([
                'recognitions_name' => ['required', 'max:50', 'min:4'],
            ])
        );

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

        return Redirect::back()->with('success', 'Membership added.');
    }

    public function update_membership($membership)
    {
        Membership::where('id', $membership)->update(
            Request::validate([
                'memberships_name' => ['required', 'max:50', 'min:4'],
            ])
        );

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
