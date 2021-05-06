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
            'psipops' => Psipop::orderBy('created_by', 'DESC')
                            ->filter(Request::only('search'))
                            ->paginate(),
        ]);
    }

    public function create() {
        return Inertia::render('Psipop/Create', [
            'employees' => Contact::get(),
        ]);
    }

    public function store(Request $request) {
        Request::validate([
            'item_number' => ['required', 'min:6'],
            'position' => ['required'],
            'tin_number' => ['required', 'min:2', 'regex:/^[0-9]+$/'],
            'incumbent_name' => ['required', 'min:6'],
            'sex' => ['required'],
            'birth_date' => ['required', 'date'],
            'appoint_date' => ['required', 'date'],
            'last_promo_date' => ['required', 'date'],
            'salary_grade' => ['required', 'min:3', 'regex:/^[0-9]+$/'],
            'authorized_salary' => ['required', 'min:3', 'regex:/^[0-9]+$/'],
            'actual_salary' => ['required', 'min:3', 'regex:/^[0-9]+$/'],
        ]);

        Psipop::create([

        ]);
    }
}
