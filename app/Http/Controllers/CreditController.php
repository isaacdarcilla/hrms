<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Credit;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

class CreditController extends Controller
{
    public function index(Contact $contact) {
        return Inertia::render('Credits/Index', [
            'filters' => Request::all('search', 'trashed'),
            'credits' => $contact->credit()
                ->orderBy('created_at', 'DESC')
                ->filter(Request::only('search', 'trashed'))
                ->paginate(),
            'employee' => $contact,
        ]);
    }
}
