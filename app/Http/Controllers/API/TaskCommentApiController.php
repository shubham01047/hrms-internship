<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\TaskComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskCommentApiController extends Controller
{
    public function index($projectId, $taskId)
    {
        $task = Task::with(['comments.user'])
            ->where('project_id', $projectId)
            ->findOrFail($taskId);
        return response()->json([
            'success' => true,
            'data' => $task->comments
        ]);
    }
    public function store(Request $request, $projectId, $taskId)
    {
        $request->validate([
            'comment' => 'required|string|max:2000',
        ]);
        $task = Task::where('project_id', $projectId)->findOrFail($taskId);
        $comment = TaskComment::create([
            'task_id'   => $task->id,
            'user_id'   => Auth::id(),  
            'comment'   => $request->comment,
            'created_at'=> now(),
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Comment added successfully.',
            'data' => $comment->load('user')
        ], 201);
    }
}
