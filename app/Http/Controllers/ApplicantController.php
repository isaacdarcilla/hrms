<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Inertia\Inertia;
use App\Models\Job;
use App\Models\Applicant;
use App\Models\Contact;

class ApplicantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Applicant/Index', [
            'filters' => Request::all('search', 'trashed'),
            'applicants' => Auth::user()->account->applicants()
                ->with('job')
                ->orderBy('created_at', 'DESC')
                ->filter(Request::only('search', 'trashed'))
                ->paginate()
                ->transform(function ($job) {
                    return [
                        'id' => $job->id,
                        'first_name' => $job->first_name,
                        'middle_name' => $job->middle_name,
                        'resume' => $job->resume,
                        'sur_name' => $job->sur_name,
                        'email' => $job->email,
                        'phone' => $job->phone,
                        'created_at' => $job->created_at,
                        'qualification_experience' => $job->qualification_experience,
                        'qualification_eligibility' => $job->qualification_eligibility,
                        'qualification_education' => $job->qualification_education,
                        'qualification_training' => $job->qualification_training,
                        'position' => $job->job ? $job->job->only('position', 'id') : null,
                    ];
                }),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($job_id)
    {
        $job = Job::find($job_id);
        $applied = Applicant::where('job_id', $job_id)
            ->where('phone', Request::input('phone'))
            ->orWhere('email', Request::input('email'))
            ->first();

        Request::validate([
            'first_name' => ['required', 'max:255', 'min:2'],
            'middle_name' => ['required', 'max:255', 'min:2'],
            'sur_name' => ['required', 'max:255', 'min:2'],
            'email' => ['required', 'max:255', 'min:2', 'email'],
            'phone' => ['required', 'max:255', 'min:2',  'regex:/^[0-9+]+$/'],
            'qualification_experience' => ['required', 'max:255'],
            'qualification_eligibility' => ['required', 'max:255'],
            'qualification_education' => ['required', 'max:255'],
            'qualification_training' => ['required', 'max:255'],
            'resume' => ['required', 'mimes:pdf,docx,doc', 'max:10240'],
        ]);

        if (!$applied) {
            Applicant::create([
                'job_id' => $job_id,
                'first_name' => Request::input('first_name'),
                'middle_name' => Request::input('middle_name'),
                'sur_name' => Request::input('sur_name'),
                'email' => Request::input('email'),
                'phone' => Request::input('phone'),
                'qualification_experience' => Request::input('qualification_experience'),
                'qualification_eligibility' => Request::input('qualification_eligibility'),
                'qualification_education' => Request::input('qualification_education'),
                'qualification_training' => Request::input('qualification_training'),
                'resume' => Request::file('resume') ? Request::file('resume')->store('resume', 'public') : null,
            ]);

            return Redirect::back()->with('success', 'You application for ' . $job->position . ' has been submitted. We will contact you using the phone number you provided.');
        } else {
            return Redirect::back()->with('error', 'You already applied for this job.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function recruit(Applicant $applicant, Job $job)
    {
        $username = strtolower(str_replace(' ', '', $applicant->sur_name)).mt_rand(1000, 9999);

        Contact::create([
            'account_id' => 1,
            'first_name' => $applicant->first_name,
            'middle_name' => $applicant->middle_name,
            'last_name' => $applicant->sur_name,
            'email' => $applicant->email,
            'username' => $username,
            'phone' => $applicant->phone,
            'position' => $job->position,
            'department' => $job->department,
            'status_of_appointment' => 'Job Order/Contractual',
            'status' => 1,
            'password' => Hash::make('secret'),
        ]);

        $job->delete();
        
        Applicant::where('job_id', $job->id)->delete();

        return Redirect::back()->with('success', 'Employee recruited and added to list.');
    }
}
