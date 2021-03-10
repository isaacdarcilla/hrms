<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\Rule;
use Inertia\Inertia;
use App\Models\Notification;
use App\Models\Leave;
use App\Models\Contact;
use Carbon\Carbon;

class AdminLeaveController extends Controller
{
    public function index() 
    {
        return Inertia::render('Leave/Index', [
            'filters' => Request::all('search', 'trashed'),
            'leaves' => Leave::orderBy('created_at', 'DESC')
                ->filter(Request::only('search', 'trashed'))
                ->paginate()
        ]);
    }

    public function approve($id) {
        Leave::find($id)->update([
            'approved_for' => 'Approved',
            'recommendation' => 'Approved',
            'updated_at' => Carbon::now(),
        ]);

        return Redirect::back()->with('success', 'Leave approved.');
    }

    public function disapprove($id) {
        Request::validate([
            'disapproved_due_to' => ['required', 'min:10'],
        ]);

        Leave::find($id)->update([
            'disapproved_due_to' => Request::input('disapproved_due_to'),
            'recommendation' => 'Disapproved',
            'updated_at' => Carbon::now(),
        ]);

        return Redirect::back()->with('error', 'Leave disapproved.');
    }
}
