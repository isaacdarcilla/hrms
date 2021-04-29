<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Profile;
use App\Models\Office;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function index($id, $type)
    {
        return Inertia::render('Contacts/Profile/Index',[
            'profile' => Profile::where('contact_id', $id)->where('type', $type)->first(),
        ]);
    }
}
