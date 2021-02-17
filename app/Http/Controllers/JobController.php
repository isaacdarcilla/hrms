<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
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
        $job->create(
            Request::validate([
                'position' => ['required', 'max:255', 'min:2'],
                'department' => ['required', 'max:255', 'min:2'],
                'item_number' => ['required', 'max:50', 'min:2'],
                'education' => ['required', 'max:255', 'min:2'],
                'experience' => ['nullable', 'max:255', 'min:2'],
                'training' => ['nullable', 'max:255', 'min:2'],
                'eligibility' => ['nullable', 'max:255', 'min:2'],
                'salary_grade' => ['required', 'max:255', 'min:2'],
                'job_description' => ['nullable', 'max:255', 'min:6'],
            ])
        );

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
        Job::find($id)->delete();

        return Redirect::back()->with('success', 'Job deleted.');
    }

    public function restore(Job $job)
    {
        $job->restore();

        return Redirect::back()->with('success', 'Job restored.');
    }
}
