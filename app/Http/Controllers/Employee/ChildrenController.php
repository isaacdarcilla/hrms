<?php

namespace App\Http\Controllers\Employee;

use App\Models\Children;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class ChildrenController extends Controller
{
    public function destroy(Children $children)
    {
        $children->delete();

        return Redirect::back()->with('success', 'Children deleted.');
    }
}
