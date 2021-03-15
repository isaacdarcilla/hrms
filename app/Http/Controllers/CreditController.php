<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Credit;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use Inertia\Inertia;

class CreditController extends Controller
{
    public function index(Contact $contact) {
        return Inertia::render('Credits/Index', [
            'filters' => Request::all('search', 'trashed'),
            'credits' => $contact->credit()
                ->where('year', '=', Carbon::now()->year)
                ->orderBy('created_at', 'DESC')
                ->filter(Request::only('search', 'trashed'))
                ->paginate(),
            'totals' => [
                'vacation' => $contact->credit()
                            ->where('year', '=', Carbon::now()->year)
                            ->sum('vacation_leave'),
                'sick' => $contact->credit()
                            ->where('year', '=', Carbon::now()
                            ->year)->sum('sick_leave'),
            ],
            'employee' => $contact,
        ]);
    }

    public function update_sick($id) {
        $request_operator = Request::input('operator');
        $operator = null;

        if ($request_operator === 'add') {
            $operator = '+';
        } elseif ($request_operator === 'minus') {
            $operator = '-';
        } else {
            $operator = '-';
        }

        Request::validate([
            'leave_credit' => ['required', 'min:1', 'regex:/^\d+(\.\d{1,4})?$/'],
        ]);

        Credit::find($id)->update([
            'sick_leave' => $operator.Request::input('leave_credit'),
        ]);

        return Redirect::back()->with('success', 'Leave credit updated.');
    }

    public function update_vacation($id) {
        $request_operator = Request::input('operator');
        $operator = null;

        if ($request_operator === 'add') {
            $operator = '+';
        } elseif ($request_operator === 'minus') {
            $operator = '-';
        } else {
            $operator = '-';
        }

        Request::validate([
            'leave_credit' => ['required', 'min:1', 'regex:/^\d+(\.\d{1,4})?$/'],
        ]);

        Credit::find($id)->update([
            'vacation_leave' => $operator.Request::input('leave_credit'),
        ]);

        return Redirect::back()->with('success', 'Leave credit updated.');
    }

    public function store($contact_id) {
        Request::validate([
            'option' => ['required'],
            'type' => ['required'],
            'leave_credit' => ['required', 'min:1', 'regex:/^\d+(\.\d{1,4})?$/'],
        ]);

        $option = Request::input('option');
        $type = Request::input('type');

        switch (true) {
            case ($option === 'increase' && $type === 'vacation');
                Credit::create([
                    'contact_id' => $contact_id,
                    'vacation_leave' => '+'.Request::input('leave_credit'),
                    'leave_number' => 'add',
                    'year' => Carbon::now()->year,
                ]);
                return Redirect::back()->with('success', 'Vacation leave credit increased.');
                break;
            case ($option === 'increase' && $type === 'sick');
                Credit::create([
                    'contact_id' => $contact_id,
                    'sick_leave' => '+'.Request::input('leave_credit'),
                    'leave_number' => 'add',
                    'year' => Carbon::now()->year,
                ]);
                return Redirect::back()->with('success', 'Sick leave credit increased.');
                break;
            case ($option === 'decrease' && $type === 'vacation');
                Credit::create([
                    'contact_id' => $contact_id,
                    'vacation_leave' => '-'.Request::input('leave_credit'),
                    'leave_number' => 'minus',
                    'year' => Carbon::now()->year,
                ]);
                return Redirect::back()->with('success', 'Vacation leave credit decreased.');
                break;
            case ($option === 'decrease' && $type === 'sick');
                Credit::create([
                    'contact_id' => $contact_id,
                    'sick_leave' => '-'.Request::input('leave_credit'),
                    'leave_number' => 'minus',
                    'year' => Carbon::now()->year,
                ]);
                return Redirect::back()->with('success', 'Sick leave credit decreased.');
                break;
            case ($option === 'increase' && $type === 'both');
                Credit::create([
                    'contact_id' => $contact_id,
                    'vacation_leave' => '+'.Request::input('leave_credit'),
                    'sick_leave' => '+'.Request::input('leave_credit'),
                    'leave_number' => 'add',
                    'year' => Carbon::now()->year,
                ]);
                return Redirect::back()->with('success', 'Sick leave credit decreased.');
                break;
            case ($option === 'decrease' && $type === 'both');
                Credit::create([
                    'contact_id' => $contact_id,
                    'vacation_leave' => '-'.Request::input('leave_credit'),
                    'sick_leave' => '-'.Request::input('leave_credit'),
                    'leave_number' => 'minus',
                    'year' => Carbon::now()->year,
                ]);
                return Redirect::back()->with('success', 'Sick leave credit decreased.');
                break;
            default;
                break;
        }
    }

    public function destroy($id) {
        Credit::find($id)->delete();

        return Redirect::back()->with('success', 'Leave credit deleted.');
    }
}
