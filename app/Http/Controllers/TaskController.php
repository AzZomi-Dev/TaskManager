<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    // Show all tasks
    public function index()
    {
        $tasks = Task::orderBy('created_at', 'desc')->get();
        return view('tasks.index', compact('tasks'));
    }

    // Add a new task
    public function store(Request $request)
    {
        $request->validate([
            'task' => 'required|string|max:255',
        ]);

        Task::create([
            'task' => $request->task,
            'start_time' => Carbon::now(),
            'user_id' => Auth::id()
        ]);

        return redirect()->route('tasks.index');
    }

    // Delete a task
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->route('tasks.index');
    }

    // Complete task
    public function complete($id)
    {
        $task = Task::findOrFail($id);
        $task->completed_at = Carbon::now();
        $task->save();
        return redirect()->route('tasks.index');
    }
}
