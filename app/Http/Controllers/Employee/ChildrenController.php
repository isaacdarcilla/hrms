<?php

namespace App\Http\Controllers\Employee;

use App\Models\Children;
use App\Models\Background;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ChildrenController extends Controller
{
    public function destroy(Children $children)
    {
        $children->delete();

        return Redirect::back()->with('success', 'Children deleted.');
    }

    public function update(Children $children)
    {
        $children->update(
            Request::validate([
                'children_name' => ['required', 'max:50', 'min:6'],
                'children_birth_date' => ['required', 'min:10'],
            ])
        );

        return Redirect::back()->with('success', 'Children information updated.');
    }

    public function store($contact, $background)
    {

		Request::validate([
            'children_name' => ['required', 'max:50', 'min:6'],
            'children_birth_date' => ['required', 'min:10'],
        ]);

    	Children::where('contact_id', $contact)->where('background_id', $background)->create([
    		'account_id' => 1,
    		'contact_id' => $contact,
    		'background_id' => $background,
    		'children_name' => Request::input('children_name'),
            'children_birth_date' => Request::input('children_birth_date'),
            'created_at' => Carbon::now(),

    	]);

        return Redirect::back()->with('success', 'Children added.');
    }
}
