<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Jobs\SendEmail;
class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
    //dd($tasks);
        return view('tasks', ['tasks' => $tasks]);
    }

    public function store(Request $request)
    {
        $task = new Task();
        $task->name = $request->name;
        $task->save();

        $users = Admin::all();
        $message = [
            'type' => 'Create task',
            'task' => $task->name,
            'content' => 'has been created!',
        ];
        SendEmail::dispatch($message, $users)->delay(now()->addMinute(1));
        return redirect()->back();
    }

    public function delete($id)
    {
        $task = Task::find($id);
        $task->delete();

        return redirect()->back();
    }
}
