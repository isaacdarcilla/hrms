<?php

namespace App\Http\Controllers\Employee;

use App\Models\Volunteer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class VolunteerController extends Controller
{
    public function destroy(Volunteer $volunteer)
    {
        $volunteer->delete();

        return Redirect::back()->with('success', 'Volunteer deleted.');
    }
}
