<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\Rule;
use Inertia\Inertia;
use App\Models\Contact;
use App\Models\Job;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Job/Index', [
            'filters' => Request::all('search', 'trashed'),
            'jobs' => Auth::user()->account->jobs()
                ->orderBy('created_at', 'DESC')
                ->filter(Request::only('search', 'trashed'))
                ->paginate()
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
    public function store(Job $job)
    {
        Request::validate([
            'position' => ['required', 'max:255', 'min:2'],
            'department' => ['required', 'max:255', 'min:2'],
            'item_number' => ['required', 'max:50', 'min:2'],
            'education' => ['required', 'max:255', 'min:2'],
            'experience' => ['nullable', 'max:255', 'min:2'],
            'training' => ['nullable', 'max:255', 'min:2'],
            'eligibility' => ['nullable', 'max:255', 'min:2'],
            'salary_grade' => ['required', 'max:255', 'min:2', 'regex:/^[0-9+]+$/'],
            'job_description' => ['required', 'min:6'],
        ]);

        $job_link = strtolower(str_replace(' ', '-', Request::input('position'))).'-'.Str::random(5);

        $job->create([
            'position' => Request::input('position'),
            'department' => Request::input('department'),
            'item_number' => Request::input('item_number'),
            'education' => Request::input('education'),
            'experience' => Request::input('experience'),
            'training' => Request::input('training'),
            'eligibility' => Request::input('eligibility'),
            'salary_grade' => Request::input('salary_grade'),
            'job_description' => Request::input('job_description'),
            'job_link' => $job_link,
        ]);

        return Redirect::back()->with('success', 'Job added.');
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
    public function update($id)
    {
        Job::where('id', $id)->update(
            Request::validate([
                'position' => ['required', 'max:255', 'min:2'],
                'department' => ['required', 'max:255', 'min:2'],
                'item_number' => ['required', 'max:50', 'min:2'],
                'education' => ['required', 'max:255', 'min:2'],
                'experience' => ['nullable', 'max:255', 'min:2'],
                'training' => ['nullable', 'max:255', 'min:2'],
                'eligibility' => ['nullable', 'max:255', 'min:2'],
                'salary_grade' => ['required', 'max:255', 'min:2', 'regex:/^[0-9+]+$/'],
                'job_description' => ['required', 'min:6'],
            ])
        );

        return Redirect::back()->with('success', 'Job updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Job::find($id)->delete();

        return Redirect::back()->with('success', 'Job deleted.');
    }

    public function restore($id)
    {
        Job::where('id', $id)->restore([
            'deleted_at' => null,
        ]);

        return Redirect::back()->with('success', 'Job restored.');
    }

    public function list() {
        $jobs = Job::orderBy('created_at', 'DESC')->get();

        $myArray = array();

        foreach ($jobs as $key) {
            $applicants = Applicant::where('job_id', $key->id)->count();
            array_push($myArray, ['count' => $applicants]);
        }

        return Inertia::render('Job/JobList', [
            'jobs' => $jobs,
            'applicants' => $myArray,
        ]);
    }

    public function job($link) {
        $job = Job::where('job_link', $link)->first();

        if($job) {
            return Inertia::render('Job/Job', [
                'jobs' => $job,
                'applicants' => Applicant::where('job_id', $job->id)->count(),
            ]);
        } else {
            return Inertia::render('Job/Job', [
                'error' => 1,
            ]);
        }
    }
}
