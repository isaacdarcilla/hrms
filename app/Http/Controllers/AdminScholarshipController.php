<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use App\Models\Scholarship;
use Carbon\Carbon;
use Inertia\Inertia;

class AdminScholarshipController extends Controller
{
    public function index() 
    {
        return Inertia::render('Scholars/Index', [
            'filters' => Request::all('search', 'trashed'),
            'scholars' => Scholarship::orderBy('created_at', 'DESC')
                    ->filter(Request::only('search', 'trashed'))
                    ->with('contact')
                    ->with('office')
                    ->paginate()
        ]);
    }

    public function view($id) 
    {
        return Inertia::render('Scholars/View', [
            'filters' => Request::all('search'),
            'scholar' => Scholarship::whereId($id)
                            ->with('contact')
                            ->with('office')
                            ->first(),
        ]);
    }
}
