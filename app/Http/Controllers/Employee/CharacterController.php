<?php

namespace App\Http\Controllers\Employee;

use App\Models\Reference;
use App\Models\Notification;
use App\Models\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;

class CharacterController extends Controller
{
    public function store(Reference $reference)
    {
        $reference->create(
            Request::validate([
                'contact_id' => ['required'],
                'name' => ['required', 'max:50', 'min:4'],
                'address' => ['required', 'max:50', 'min:4'],
                'telephone_number' => ['required', 'max:50', 'min:4'],
            ])
        );

        Notification::create([
            'contact_id' => Request::input('contact_id'),
            'notification' => 'added a reference.',
        ]);

        return Redirect::back()->with('success', 'Reference added.');
    }
}
