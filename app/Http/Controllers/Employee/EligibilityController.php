<?php

namespace App\Http\Controllers\Employee;

use App\Models\Service;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class EligibilityController extends Controller
{
    public function destroy(Service $eligibility)
    {
        $eligibility->delete();

        return Redirect::back()->with('success', 'Eligibility deleted.');
    }
}
