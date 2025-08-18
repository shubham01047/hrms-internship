<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\TaskComment;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskCommentController extends Controller
{
    public function store(Request $request, $projectId, $taskId)
    {
        $request->validate([
            'comment' => 'required|string|max:2000',
        ]);
        $task = Task::findOrFail($taskId);
        $comment = TaskComment::create([
            'task_id' => $task->id,
            'user_id' => Auth::id(),
            'comment' => $request->comment,
            'created_at' => now(),
        ]);
        return redirect()->back()->with('success', 'Comment added successfully.');
    }
    public function index($projectId, Task $task)
    {
        $project = Project::findOrFail($projectId);
        $comments = $task->comments()->with('user')->orderBy('created_at', 'desc')->get();
        return view('tasks.comments.index', compact('project', 'task', 'comments'));
    }

}
