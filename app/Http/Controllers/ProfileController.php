<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Profile;
use App\Models\Office;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function index($id, $type)
    {
        return Inertia::render('Contacts/Profile/Teaching',[
            'contact' => Contact::with('office')->find($id),
            'profile' => Profile::where('contact_id', $id)->where('type', $type)->first(),
            'type' => ucwords($type),
        ]);
    }

    public function list()
    {
        $type = Request::get('type') ? 'non-teaching' : 'teaching';

        return Inertia::render('Teaching/Index',[
            'filters' => Request::all('search'),
            'profiles' => Profile::where('type', $type)
                ->with('contact')
                ->with('office')
                ->orderBy('created_at', 'DESC')
                ->filter(Request::only('search'))
                ->paginate(),
        ]);
    }

    public function update_education(Request $request, $contact, $type) {
        $profile = Profile::where('contact_id', $contact)->where('type', $type)->first();

        Request::validate([
            'bachelors_degree' => ['required', 'min:3'],
            'bachelors_specialization' => ['required', 'min:3'],	
            'masters_degree' => ['required', 'min:3'],	
            'masters_specialization' => ['required', 'min:3'],	
            'masters_units_earned' => ['required', 'max:4', 'regex:/^[0-9]+$/'],	
            'doctorate_degree' => ['required', 'min:3'],	
            'doctorate_specialization' => ['required', 'min:3'],	
            'doctorate_units_earned' => ['required', 'max:4', 'regex:/^[0-9]+$/'],	
            'name_of_school' => ['required', 'min:3'],
        ]);

        if($profile) {
            Profile::where('id', Request::input('id'))->update([
                'office_id'	=> Request::input('office_id'),
                'bachelors_degree' => Request::input('bachelors_degree'),
                'bachelors_specialization' => Request::input('bachelors_specialization'),	
                'masters_degree' => Request::input('masters_degree'),	
                'masters_specialization' => Request::input('masters_specialization'),	
                'masters_units_earned' => Request::input('masters_units_earned'),	
                'doctorate_degree' => Request::input('doctorate_degree'),	
                'doctorate_specialization' => Request::input('doctorate_specialization'),	
                'doctorate_units_earned' => Request::input('doctorate_units_earned'),
                'name_of_school' => Request::input('name_of_school'),
                'tenure_of_employment' => Request::input('tenure_of_employment'),
            ]);

            return Redirect::back()->with('success', ucwords($type).' profile updated.');
        } else {
            Profile::create([
                'contact_id' => $contact,	
                'office_id'	=> Request::input('office_id'),
                'type' => $type,
                'bachelors_degree' => Request::input('bachelors_degree'),
                'bachelors_specialization' => Request::input('bachelors_specialization'),	
                'masters_degree' => Request::input('masters_degree'),	
                'masters_specialization' => Request::input('masters_specialization'),	
                'masters_units_earned' => Request::input('masters_units_earned'),	
                'doctorate_degree' => Request::input('doctorate_degree'),	
                'doctorate_specialization' => Request::input('doctorate_specialization'),	
                'doctorate_units_earned' => Request::input('doctorate_units_earned'),
                'name_of_school' => Request::input('name_of_school'),
                'tenure_of_employment' => Request::input('tenure_of_employment'),
            ]);

            return Redirect::back()->with('success', ucwords($type).' profile created.');
        }
    }

    public function update_work(Request $request, $contact, $type) {
        $profile = Profile::where('contact_id', $contact)->where('type', $type)->first();

        Request::validate([				
            'position' => ['required', 'min:3'],
            'salary_grade' => ['required', 'min:2', 'regex:/^[0-9]+$/'],	
            'monthly_salary' => ['required', 'min:3', 'regex:/^[0-9]+$/'],	
            'annual_salary' => ['required', 'min:3', 'regex:/^[0-9]+$/'],	
            'professional_licensure_passed' => ['required', 'min:3'],	
        ]);

        if($profile) {
            Profile::where('id', Request::input('id'))->update([
                'office_id'	=> Request::input('office_id'),
                'position' => Request::input('position'),
                'salary_grade' => Request::input('salary_grade'),	
                'monthly_salary' => Request::input('monthly_salary'),	
                'annual_salary' => Request::input('annual_salary'),	
                'professional_licensure_passed' => Request::input('professional_licensure_passed'),
                'tenure_of_employment' => Request::input('tenure_of_employment'),
            ]);

            return Redirect::back()->with('success', ucwords($type).' profile updated.');
        } else {
            Profile::create([
                'contact_id' => $contact,	
                'office_id'	=> Request::input('office_id'),
                'type' => $type,
                'position' => Request::input('position'),
                'salary_grade' => Request::input('salary_grade'),	
                'monthly_salary' => Request::input('monthly_salary'),	
                'annual_salary' => Request::input('annual_salary'),	
                'professional_licensure_passed' => Request::input('professional_licensure_passed'),
                'tenure_of_employment' => Request::input('tenure_of_employment'),
            ]);

            return Redirect::back()->with('success', ucwords($type).' profile created.');
        }
    }
}
