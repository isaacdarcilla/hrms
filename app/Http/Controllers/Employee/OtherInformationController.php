<?php

namespace App\Http\Controllers\Employee;

use App\Models\Skill;
use App\Models\Recognition;
use App\Models\Membership;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class OtherInformationController extends Controller
{
    public function destroy_skill(Skill $skill)
    {
        $skill->delete();

        return Redirect::back()->with('success', 'Skill deleted.');
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
