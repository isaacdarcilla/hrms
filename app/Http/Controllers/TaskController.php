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
    public function store(Task $task)
    {
        $task->create(
            Request::validate([
                'notice_type' => ['required', 'max:255', 'min:2'],
                'notice_subject' => ['required', 'max:255', 'min:2'],
                'notice_description' => ['required', 'min:12'],
            ])
        );

        return Redirect::back()->with('success', 'Task added.');
    }
}
