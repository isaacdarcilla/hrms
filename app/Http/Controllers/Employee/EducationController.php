<?php

namespace App\Http\Controllers\Employee;

use App\Models\Education;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
class EducationController extends Controller
{
    public function destroy(Education $education)
    {
        $education->delete();

        return Redirect::back()->with('success', 'Education deleted.');
    }

    public function store(Education $education)
    {
        $education->create(
            Request::validate([
                'contact_id' => ['required'],
                'education_level' => ['required', 'max:50', 'min:2'],
                'education_school_name' => ['required', 'max:50', 'min:2'],
                'education_course' => ['required', 'max:50', 'min:2'],
                'from' => ['required', 'max:25', 'min:2'],
                'to' => ['required', 'max:25', 'min:2'],
                'education_highest_level_earned' => ['nullable', 'max:50', 'min:2'],
                'education_year_graduated' => ['required', 'max:50', 'min:2'],
                'education_honors_received' => ['required', 'max:50', 'min:2'],
            ])
        );

        return Redirect::back()->with('success', 'Educational background added.');
    }

    public function update($education)
    {
        Education::where('id', $education)->update(
            Request::validate([
                'education_level' => ['required', 'max:50', 'min:2'],
                'education_school_name' => ['required', 'max:50', 'min:2'],
                'education_course' => ['required', 'max:50', 'min:2'],
                'from' => ['required', 'max:25', 'min:2'],
                'to' => ['required', 'max:25', 'min:2'],
                'education_highest_level_earned' => ['nullable', 'max:50', 'min:2'],
                'education_year_graduated' => ['required', 'max:50', 'min:2'],
                'education_honors_received' => ['required', 'max:50', 'min:2'],
            ])
        );

        return Redirect::back()->with('success', 'Educational background added.');
    }
}
