<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\Rule;
use Inertia\Inertia;
use App\Models\Notification;
use App\Models\Inquiry;
use App\Models\Contact;
use App\Models\EmployeeSetting;
use Carbon\Carbon;

class InquiryController extends Controller
{
    public function index() 
    {
        $employee =  Auth::guard('employee')->user();

        if($employee)
            return Inertia::render('EmployeePanel/Inquiry/Index', [
                'employee' => $employee,
                'filters' => Request::all('search', 'trashed'),
                'inquiries' => Inquiry::where('contact_id', auth()->guard('employee')->user()->id)
                                ->filter(Request::only('search', 'trashed'))
                                ->orderBy('created_at', 'DESC')
                                ->paginate(),
            ]);
        else
            return redirect()->route('login.employee');
    }

    public function store(Contact $contact)
    {
        $employee =  Auth::guard('employee')->user();

        if($employee) {
            Request::validate([
                'image' => ['nullable', 'mimes:png,jpg,jpeg', 'max:10240'],
                'type' => ['required', 'min:4'],
                'description' => ['required', 'min:6', 'max:255'],
                'inquiry_number' => ['required']
            ]);

            Inquiry::create([
                'contact_id' => $employee->id,
                'inquiry_number' => Request::input('inquiry_number'),
                'type' => Request::input('type'),
                'description' => Request::input('description'),
                'resolved' => 0,
                'status' => 'Pending',
                'description' => Request::input('description'),
                'image' => Request::file('image') ? Request::file('image')->store('inquiry', 'public') : null,
            ]);

            return Redirect::back()->with('success', 'Inquiry submitted');
        } else {
            return redirect()->route('login.employee');
        }
    }
}
