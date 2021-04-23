<?php

namespace App\Http\Controllers\Employee;

use App\Models\Reference;
use App\Models\GovernmentId;
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

    public function store_ids(GovernmentId $reference)
    {
        $reference->create(
            Request::validate([
                'contact_id' => ['required'],
                'government_issued_id' => ['required', 'max:50', 'min:4'],
                'id_number' => ['required', 'max:50', 'min:4'],
                'date_of_issuance' => ['required', 'max:50', 'min:4', 'date'],
                'place_of_issuance' => ['required', 'max:50', 'min:4'],
            ])
        );

        Notification::create([
            'contact_id' => Request::input('contact_id'),
            'notification' => 'added a government id.',
        ]);

        return Redirect::back()->with('success', 'Government ID added.');
    }

    public function update_ids(GovernmentId $ids)
    {
        $ids->update(
            Request::validate([
                'government_issued_id' => ['required', 'max:50', 'min:4'],
                'id_number' => ['required', 'max:50', 'min:4'],
                'date_of_issuance' => ['required', 'max:50', 'min:4', 'date'],
                'place_of_issuance' => ['required', 'max:50', 'min:4'],
            ])
        );

        Notification::create([
            'contact_id' => Request::input('contact_id'),
            'notification' => 'updated a government id.',
        ]);

        return Redirect::back()->with('success', 'Government ID updated.');
    }

    public function update($id)
    {
        Reference::find($id)->update(
            Request::validate([
                'name' => ['required', 'max:50', 'min:4'],
                'address' => ['required', 'max:50', 'min:4'],
                'telephone_number' => ['required', 'max:50', 'min:4'],
            ])
        );

        return Redirect::back()->with('success', 'Reference updated.');
    }

    public function destroy(Reference $reference)
    {
        $reference->delete();

        return Redirect::back()->with('success', 'Reference deleted.');
    }

    public function destroy_ids(GovernmentId $ids)
    {
        $ids->delete();

        return Redirect::back()->with('success', 'Government ID deleted.');
    }
}
