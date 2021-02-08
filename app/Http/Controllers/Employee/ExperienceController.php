<?php

namespace App\Http\Controllers\Employee;

use App\Models\Experience;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class ExperienceController extends Controller
{
    public function destroy(Experience $experience)
    {
        $experience->delete();

        return Redirect::back()->with('success', 'Experience deleted.');
    }
}
