<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Credit;
use App\Models\CtoCredit;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use Inertia\Inertia;

class CtoCreditController extends Controller
{
    public function index(Contact $contact) {
        return Inertia::render('Credits/Cto', [
            'filters' => Request::all('search', 'trashed'),
            'credits' => $contact->ctocredit()
                ->with('user')
                ->with('leave')
                ->where('year', '=', Carbon::now()->year)
                ->orderBy('created_at', 'DESC')
                ->filter(Request::only('search', 'trashed'))
                ->paginate(),
            'totals' => [
                'vacation' => $contact->ctocredit()
                            ->where('year', '=', Carbon::now()->year)
                            ->sum('cto_leave'),
                'sick' => $contact->ctocredit()
                            ->where('year', '=', Carbon::now()
                            ->year)->sum('spl_leave'),
            ],
            'employee' => $contact,
            'hr' => Setting::where('id', 1)->first(),
        ]);
    }
}
