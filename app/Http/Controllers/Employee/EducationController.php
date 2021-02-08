<?php

namespace App\Http\Controllers\Employee;

use App\Models\Education;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class EducationController extends Controller
{
    public function destroy(Education $education)
    {
        $education->delete();

        return Redirect::back()->with('success', 'Education deleted.');
    }
}
