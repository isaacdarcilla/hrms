<?php

namespace App\Http\Controllers;

use App\Models\Psipop;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

class PsipopController extends Controller
{
    public function index() {
        return Inertia::render('Psipop/Index', [
            'filters' => Request::all('search'),
            'psipops' => Psipop::orderBy('created_at', 'DESC')
                            ->filter(Request::only('search'))
                            ->paginate(30),
        ]);
    }

    public function create() {
        return Inertia::render('Psipop/Create', [
            'employees' => Contact::get(),
        ]);
    }

    public function edit($id) {
        return Inertia::render('Psipop/Edit', [
            'employees' => Contact::get(),
            'psipop' => Psipop::find($id),
        ]);
    }

    public function store(Request $request) {
        Request::validate([
            'item_number' => ['required', 'min:6'],
            'position' => ['required'],
            'salary_grade' => ['required', 'regex:/^[0-9]+$/'],
            'authorized_salary' => ['required', 'min:3', 'regex:/^[0-9]+$/'],
            'monthly_salary' => ['required', 'min:3', 'regex:/^[0-9]+$/'],
        ]);

        Psipop::create([
            'item_number' => Request::input('item_number'),	 
            'position' => Request::input('position'),		
            'salary_grade' => Request::input('salary_grade'),		
            'step_increment' => 1,		
            'filled_position' => 0,		
            'actual_salary' => 0,
            'monthly_salary' => Request::input('monthly_salary'),	
            'authorized_salary' => Request::input('authorized_salary'),		
        ]);

        return Redirect::back()->with('success', 'PSIPOP added.');
    }

    public function update($id) {
        Request::validate([
            'item_number' => ['required', 'min:6'],
            'position' => ['required'],
            'tin_number' => ['required', 'min:2', 'regex:/^[0-9-]+$/'],
            'incumbent_name' => ['required', 'min:6'],
            'sex' => ['required'],
            'birth_date' => ['required', 'date'],
            'appoint_date' => ['required', 'date'],
            'last_promo_date' => ['required', 'date', 'after:appoint_date'],
            'salary_grade' => ['required', 'regex:/^[0-9]+$/'],
            'monthly_salary' => ['required', 'min:3', 'regex:/^[0-9]+$/'],
            'authorized_salary' => ['required', 'min:3', 'regex:/^[0-9]+$/'],
            'actual_salary' => ['required', 'min:3', 'regex:/^[0-9]+$/'],
        ]);

        Psipop::find($id)->update([
            'item_number' => Request::input('item_number'),	 
            'position' => Request::input('position'),		
            'tin_number' => Request::input('tin_number'),
            'incumbent_name' => Request::input('incumbent_name'), 
            'sex' => Request::input('sex'),
            'birth_date' => Request::input('birth_date'), 
            'appoint_date' => Request::input('appoint_date'), 
            'last_promo_date' => Request::input('last_promo_date'), 
            'salary_grade' => Request::input('salary_grade'),			
            'filled_position' => Request::input('filled_position'),	
            'authorized_salary' => Request::input('authorized_salary'),		
            'actual_salary' => Request::input('actual_salary'),	
        ]);

        return Redirect::back()->with('success', 'PSIPOP updated.');
    }


    public function destroy($id)
    {
        Psipop::find($id)->delete();

        return Redirect::back()->with('success', 'Psipop deleted.');
    }
}
