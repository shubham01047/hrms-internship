<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;

class TaskApiController extends Controller
{
    public function index($projectId)
    {
        $project = Project::with(['tasks.assignedUsers'])->findOrFail($projectId);
        return response()->json([
            'success' => true,
            'data' => $project->tasks
        ]);
    }
    public function store(Request $request, $projectId)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'priority' => 'required|in:Low,Medium,High,Urgent',
            'status' => 'required|in:To-Do,In Progress,On Hold,Done',
            'due_date' => 'nullable|date',
            'assigned_user_ids' => 'nullable|array',
            'assigned_user_ids.*' => 'exists:users,id'
        ]);
        $task = new Task();
        $task->project_id = $projectId;
        $task->title = $validated['title'];
        $task->description = $validated['description'] ?? null;
        $task->priority = $validated['priority'];
        $task->status = $validated['status'];
        $task->due_date = $validated['due_date'] ?? null;
        $task->save();
        if (!empty($validated['assigned_user_ids'])) {
            $task->assignedUsers()->sync($validated['assigned_user_ids']);
        }
        return response()->json([
            'success' => true,
            'message' => 'Task created successfully.',
            'data' => $task->load('assignedUsers')
        ], 201);
    }
    public function show($projectId, $taskId)
    {
        $task = Task::with('assignedUsers')
            ->where('project_id', $projectId)
            ->findOrFail($taskId);
        return response()->json([
            'success' => true,
            'data' => $task
        ]);
    }
    public function update(Request $request, $projectId, $taskId)
    {
        $task = Task::where('project_id', $projectId)->findOrFail($taskId);
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'priority' => 'required|in:Low,Medium,High,Urgent',
            'status' => 'required|in:To-Do,In Progress,On Hold,Done',
            'due_date' => 'nullable|date',
            'assigned_user_ids' => 'nullable|array',
            'assigned_user_ids.*' => 'exists:users,id'
        ]);
        $task->update([
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'priority' => $validated['priority'],
            'status' => $validated['status'],
            'due_date' => $validated['due_date'] ?? null,
        ]);
        $task->assignedUsers()->sync($validated['assigned_user_ids'] ?? []);
        return response()->json([
            'success' => true,
            'message' => 'Task updated successfully.',
            'data' => $task->load('assignedUsers')
        ]);
    }
    public function destroy($projectId, $taskId)
    {
        $task = Task::where('project_id', $projectId)->findOrFail($taskId);
        $task->assignedUsers()->detach();
        $task->delete();
        return response()->json([
            'success' => true,
            'message' => 'Task deleted successfully.'
        ]);
    }
}
