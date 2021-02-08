<?php

namespace App\Http\Controllers\Employee;

use App\Models\Training;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class TrainingController extends Controller
{
    public function destroy(Training $training)
    {
        $training->delete();

        return Redirect::back()->with('success', 'Training deleted.');
    }
}
