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
                'cto' => $contact->ctocredit()
                            ->where('year', '=', Carbon::now()->year)
                            ->sum('cto_leave'),
                'spl' => $contact->ctocredit()
                            ->where('year', '=', Carbon::now()
                            ->year)->sum('spl_leave'),
            ],
            'employee' => $contact,
            'hr' => Setting::where('id', 1)->first(),
        ]);
    }

    public function store($contact_id) {
        Request::validate([
            'option' => ['required'],
            'type' => ['required'],
        ]);

        $option = Request::input('option');
        $type = Request::input('type');

        switch (true) {
            case ($option === 'increase' && $type === 'cto');
                Request::validate([
                    'option' => ['required'],
                    'type' => ['required'],
                    'remarks' => ['required'],
                    'leave_credit' => ['required', 'min:1', 'regex:/^\d+(\.\d{1,4})?$/'],
                ]);

                CtoCredit::create([
                    'contact_id' => $contact_id,
                    'cto_leave' => '+'.Request::input('leave_credit'),
                    'leave_number' => 'add',
                    'year' => Carbon::now()->year,
                    'user_id' => Auth::user()->id,
                    'remarks' => Request::input('remarks'),
                ]);
                return Redirect::back()->with('success', 'CTO leave credit increased.');
                break;
            case ($option === 'increase' && $type === 'spl');
                CtoCredit::validate([
                    'option' => ['required'],
                    'type' => ['required'],
                    'remarks' => ['required'],
                    'leave_credit' => ['required', 'min:1', 'regex:/^\d+(\.\d{1,4})?$/'],
                ]);

                CtoCredit::create([
                    'contact_id' => $contact_id,
                    'spl_leave' => '+'.Request::input('leave_credit'),
                    'leave_number' => 'add',
                    'year' => Carbon::now()->year,
                    'user_id' => Auth::user()->id,
                    'remarks' => Request::input('remarks'),
                ]);
                return Redirect::back()->with('success', 'SPL leave credit increased.');
                break;
            case ($option === 'decrease' && $type === 'cto');
                Request::validate([
                    'option' => ['required'],
                    'type' => ['required'],
                    'remarks' => ['required'],
                    'leave_credit' => ['required', 'min:1', 'regex:/^\d+(\.\d{1,4})?$/'],
                    'particulars' => ['required'],
                ]);

                CtoCredit::create([
                    'contact_id' => $contact_id,
                    'cto_leave' => '-'.Request::input('leave_credit'),
                    'leave_number' => 'minus',
                    'year' => Carbon::now()->year,
                    'user_id' => Auth::user()->id,
                    'particular' => Request::input('particulars'),
                    'remarks' => Request::input('remarks'),
                ]);
                return Redirect::back()->with('success', 'CTO leave credit decreased.');
                break;
            case ($option === 'decrease' && $type === 'spl');
                Request::validate([
                    'option' => ['required'],
                    'type' => ['required'],
                    'remarks' => ['required'],
                    'leave_credit' => ['required', 'min:1', 'regex:/^\d+(\.\d{1,4})?$/'],
                    'particulars' => ['required'],
                ]);

                CtoCredit::create([
                    'contact_id' => $contact_id,
                    'spl_leave' => '-'.Request::input('leave_credit'),
                    'leave_number' => 'minus',
                    'year' => Carbon::now()->year,
                    'user_id' => Auth::user()->id,
                    'particular' => Request::input('particulars'),
                    'remarks' => Request::input('remarks'),
                ]);
                return Redirect::back()->with('success', 'SPL leave credit decreased.');
                break;
            case ($option === 'increase' && $type === 'both');
                Request::validate([
                    'option' => ['required'],
                    'type' => ['required'],
                    'remarks' => ['required'],
                    'leave_credit' => ['required', 'min:1', 'regex:/^\d+(\.\d{1,4})?$/'],
                ]);

                CtoCredit::create([
                    'contact_id' => $contact_id,
                    'cto_leave' => '+'.Request::input('leave_credit'),
                    'spl_leave' => '+'.Request::input('leave_credit'),
                    'leave_number' => 'add',
                    'year' => Carbon::now()->year,
                    'remarks' => Request::input('remarks'),
                    'user_id' => Auth::user()->id,
                ]);
                return Redirect::back()->with('success', 'SPL leave credit decreased.');
                break;
            case ($option === 'decrease' && $type === 'both');
                Request::validate([
                    'option' => ['required'],
                    'type' => ['required'],
                    'remarks' => ['required'],
                    'leave_credit' => ['required', 'min:1', 'regex:/^\d+(\.\d{1,4})?$/'],
                    'particulars' => ['required'],
                ]);
                
                CtoCredit::create([
                    'contact_id' => $contact_id,
                    'cto_leave' => '-'.Request::input('leave_credit'),
                    'spl_leave' => '-'.Request::input('leave_credit'),
                    'leave_number' => 'minus',
                    'year' => Carbon::now()->year,
                    'user_id' => Auth::user()->id,
                    'particular' => Request::input('particulars'),
                    'remarks' => Request::input('remarks'),
                ]);
                return Redirect::back()->with('success', 'SPL leave credit decreased.');
                break;
            default;
                break;
        }
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
            'particulars' => ['required'],
        ]);

        $leave = CtoCredit::find($id);

        CtoCredit::find($id)->update([
            'spl_leave' => $operator.Request::input('leave_credit'),
            'user_id' => Auth::user()->id,
            'particular' => Request::input('particulars'),
            'remarks' => Request::input('remarks') == null ? $leave->remarks : Request::input('remarks'),
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
            'particulars' => ['required'],
        ]);

        $leave = CtoCredit::find($id);

        CtoCredit::find($id)->update([
            'cto_leave' => $operator.Request::input('leave_credit'),
            'user_id' => Auth::user()->id,
            'particular' => Request::input('particulars'),
            'remarks' => Request::input('remarks') == null ? $leave->remarks : Request::input('remarks'),
        ]);

        return Redirect::back()->with('success', 'Leave credit updated.');
    }

    public function destroy($id) {
        CtoCredit::find($id)->delete();

        return Redirect::back()->with('success', 'Leave credit deleted.');
    }
}
