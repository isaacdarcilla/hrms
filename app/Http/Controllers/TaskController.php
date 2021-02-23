<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Support\Carbon;
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

    public function update(Task $task)
    {
        $task->update([
            'cleared_at' => Carbon::now(),
        ]);

        return Redirect::back()->with('success', 'Task marked as done.');
    }

    public function update_undone(Task $task)
    {
        $task->update([
            'cleared_at' => null,
        ]);

        return Redirect::back()->with('success', 'Task marked as undone.');
    }

    public function destroy($id)
    {
        Task::where('user_id', $id)->delete();

        return Redirect::back()->with('success', 'Tasks cleared.');
    }

    // Employee

    public function store_employee($user)
    {
        Task::create([
            'account_id' => 1,
            'contact_id' => $user,
            'description' => Request::input('description')
        ]);

        return Redirect::back()->with('success', 'Task added.');
    }

    public function update_employee(Task $task)
    {
        $task->update([
            'cleared_at' => Carbon::now(),
        ]);

        return Redirect::back()->with('success', 'Task marked as done.');
    }

    public function update_undone_employee(Task $task)
    {
        $task->update([
            'cleared_at' => null,
        ]);

        return Redirect::back()->with('success', 'Task marked as undone.');
    }

    public function destroy_employee($id)
    {
        Task::where('contact_id', $id)->delete();

        return Redirect::back()->with('success', 'Tasks cleared.');
    }
}
