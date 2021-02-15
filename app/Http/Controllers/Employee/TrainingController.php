<?php

namespace App\Http\Controllers\Employee;

use App\Models\Training;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;

class TrainingController extends Controller
{
	public function store(Training $training)
    {
        $training->create(
            Request::validate([
                'contact_id' => ['required'],
		        'trainings_name' => ['required', 'max:50', 'min:4'],
		        'trainings_from' => ['required', 'max:50', 'min:10', 'date'],
		        'trainings_to' => ['required', 'max:50', 'min:10', 'date'],
		        'trainings_number_of_hours' => ['required', 'max:50', 'min:1', 'regex:/^[0-9]+$/'],
		        'trainings_type' => ['required', 'max:50', 'min:4'],
		        'trainings_sponsored_by' => ['required', 'max:50', 'min:4'],
            ])
        );

        return Redirect::back()->with('success', 'Training added.');
    }

    public function update($training)
    {
        Training::where('id', $training)->update(
            Request::validate([
		        'trainings_name' => ['required', 'max:50', 'min:4'],
		        'trainings_from' => ['required', 'max:50', 'min:10', 'date'],
		        'trainings_to' => ['required', 'max:50', 'min:10', 'date'],
		        'trainings_number_of_hours' => ['required', 'max:50', 'min:1', 'regex:/^[0-9]+$/'],
		        'trainings_type' => ['required', 'max:50', 'min:4'],
		        'trainings_sponsored_by' => ['required', 'max:50', 'min:4'],
            ])
        );

        return Redirect::back()->with('success', 'Training updated.');
    }

    public function destroy(Training $training)
    {
        $training->delete();

        return Redirect::back()->with('success', 'Training deleted.');
    }
}
