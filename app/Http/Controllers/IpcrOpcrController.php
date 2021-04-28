<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use App\Models\IpcrOpcr;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;

class IpcrOpcrController extends Controller
{
    public function index(Contact $contact)
    {
        $employee =  Auth::guard('employee')->user();

        if($employee)
            return Inertia::render('EmployeePanel/Ipcr/Index', [
                'employee' => $employee,
                'documents' => $contact->ipcr()->paginate(),
            ]);
        else
            return redirect()->route('login.employee');
    }

    public function store(Request $request) 
    {
        $request->validate([
            'type' => ['required', 'max:255'],
            'file_name' => ['required', 'mimes:pdf,docx,doc', 'max:10240'],
        ]);

        IpcrOpcr::create([
            'contact_id' => $request->input('contact_id'),
            'type' => $request->input('type'),
            'file_name' => $request->input('name'),
            'file_path' => $request->file('file_name') ? $request->file('file_name')->store('ipcr_opcr', 'public') : null,
        ]);

        return Redirect::back()->with('success', $request->input('type').' uploaded.');
    }

    public function destroy($id)
    {
        IpcrOpcr::find($id)->delete();

        return Redirect::back()->with('success', 'Document deleted.');
    }
}
