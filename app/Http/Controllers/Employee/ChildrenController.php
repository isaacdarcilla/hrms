<?php

namespace App\Http\Controllers\Employee;

use App\Models\Children;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;

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
}
