<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

class TaskController extends Controller
{
    public function store($user)
    {
        Task::create([
            'account_id' => 1,
            'user_id' => $user,
            'description' => Request::input('description')
        ]);

        return Redirect::back()->with('success', 'Task added.');
    }
}
