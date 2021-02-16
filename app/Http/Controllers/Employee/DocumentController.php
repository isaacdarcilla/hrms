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
    	$document->create(
    		Request::validate([
    			'contact_id' => ['required'],
    			'document_name' => ['required', 'max:50', 'min:4'],
        		'document_file' => ['required', 'max:50', 'min:1', 'mimes:xls,xlsx,pdf'],
    		])
    	);
    }
}
