<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;
use App\Models\IpcrOpcr;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;

class AdminIpcrOpcrController extends Controller
{
    public function index()
    {
        return Inertia::render('Ipcr/Index', [
            'documents' => IpcrOpcr::with('contact')->paginate(),
        ]);
    }
}
