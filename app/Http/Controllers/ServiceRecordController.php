<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\ServiceRecord;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use Inertia\Inertia;

class ServiceRecordController extends Controller
{
    public function index(Contact $contact) 
    {
        return Inertia::render('ServiceRecord/Index', [
            'filters' => Request::all('search', 'trashed'),
            'employee' => $contact,
            'service_records' => $contact->service_records()->orderBy('created_at', 'DESC')
                ->with('contact')
                ->with('user')
                ->paginate()
        ]);
    }

    public function store(Request $request) 
    {
        Request::validate([
            'service_start' => ['required', 'max:50', 'min:10', 'date'],
            'service_end' => ['required', 'max:50', 'min:10', 'date', 'after:service_start'],
            'designation' => ['required'],
            'status' => ['required'],
            'salary' => ['required', 'max:50', 'min:2', 'regex:/^[0-9]+$/'],
            'station_or_place' => ['required', 'max:255', 'min:2',],
            'branch' => ['required', 'max:255', 'min:2',],
            'pay' => ['required', 'max:255', 'min:2',],
            'separation_date' => ['required', 'max:50', 'min:10', 'date'],
            'separation_cause' => ['required'],
        ]);

        ServiceRecord::create([
            'contact_id' => Request::input('contact_id'),
            'user_id' => Request::input('user_id'),
            'service_start' => Request::input('service_start'),
            'service_end' => Request::input('service_end'),
            'designation' => Request::input('designation'),
            'status' => Request::input('status'),
            'salary' => Request::input('salary'),
            'station_or_place' => Request::input('station_or_place'),
            'branch' => Request::input('branch'),
            'pay' => Request::input('pay'),
            'separation_date' => Request::input('separation_date'),
            'separation_cause' => Request::input('separation_cause'),
        ]);

        return Redirect::back()->with('success', 'Service record created.');
    }

    public function destroy($id)
    {
        ServiceRecord::find($id)->delete();

        return Redirect::back()->with('success', 'Service record deleted.');
    }

    public function update($id)
    {
        Request::validate([
            'service_start' => ['required', 'max:50', 'min:10', 'date'],
            'service_end' => ['required', 'max:50', 'min:10', 'date', 'after:service_start'],
            'designation' => ['required'],
            'status' => ['required'],
            'salary' => ['required', 'max:50', 'min:2', 'regex:/^[0-9]+$/'],
            'station_or_place' => ['required', 'max:255', 'min:2',],
            'branch' => ['required', 'max:255', 'min:2',],
            'pay' => ['required', 'max:255', 'min:2',],
            'separation_date' => ['required', 'max:50', 'min:10', 'date'],
            'separation_cause' => ['required'],
        ]);

        $record = ServiceRecord::find($id);

        ServiceRecord::find($id)->update([
            'service_start' => Request::input('service_start'),
            'service_end' => Request::input('service_end'),
            'designation' => Request::input('designation'),
            'status' => Request::input('status'),
            'salary' => Request::input('salary'),
            'station_or_place' => Request::input('station_or_place'),
            'branch' => Request::input('branch'),
            'pay' => Request::input('pay'),
            'separation_date' => Request::input('separation_date'),
            'separation_cause' => Request::input('separation_cause'),
        ]);

        return Redirect::back()->with('success', 'Service record updated.');
    }
}
