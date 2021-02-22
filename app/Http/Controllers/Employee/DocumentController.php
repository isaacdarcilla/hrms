<?php

namespace App\Http\Controllers\Employee;

use App\Models\Document;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;

class DocumentController extends Controller
{
    public function destroy(Document $document)
    {
        $document->delete();

        return Redirect::back()->with('success', 'Document deleted.');
    }

    public function store(Document $document)
    {
    	Request::validate([
    		'contact_id' => ['required'],
    		'document_type' => ['required'],
        	'document_file' => ['required', 'max:10240', 'min:1', 'mimes:xls,xlsx,pdf,doc,docx'],
    	]);

    	$document->create([
            'contact_id' => Request::input('contact_id'),
            'document_type' => Request::input('document_type'),
            'document_name' => Request::input('document_name'),
            'document_file' => Request::file('document_file') ? Request::file('document_file')->store('docs', 'public') : null,
        ]);

    	return Redirect::back()->with('success', 'Document added.');
    }
}
