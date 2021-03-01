<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Carbon;
use Inertia\Inertia;

class NotificationController extends Controller
{
    public function update() {
        Notification::where('read_at', null)->update([
            'read_at' => Carbon::now(),
        ]);

        return redirect()->back();
    }
}
