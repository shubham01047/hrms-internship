<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class TaskController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:edit task', only: ['edit']),
            new Middleware('permission:create task', only: ['create']),
            new Middleware('permission:delete task', only: ['destroy']),
        ];
    }
    public function create($projectId)
    {
        $project = Project::with('users')->findOrFail($projectId); // Only show assigned users
        return view('tasks.create', compact('project'));
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

        return redirect()->route('projects.show', $projectId)->with('success', 'Task created successfully.');
    }

    public function show($projectId, Task $task)
    {
        $task->load('assignedUsers'); // eager load assigned users
        return view('projects.show', compact('task'));
    }

    public function edit($projectId, Task $task)
    {
        $project = Project::with('users')->findOrFail($projectId);
        $task->load('assignedUsers');
        return view('tasks.edit', compact('task', 'project'));
    }

    public function update(Request $request, $projectId, Task $task)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'priority' => 'required|in:Low,Medium,High,Urgent',
            'status' => 'required|in:To-Do,In Progress,On Hold,Done',
            'due_date' => 'nullable|date',
            'assigned_user_ids' => 'nullable|array',
        ]);

        $task->title = $validated['title'];
        $task->description = $validated['description'] ?? null;
        $task->priority = $validated['priority'];
        $task->status = $validated['status'];
        $task->due_date = $validated['due_date'] ?? null;
        $task->save();

        $task->assignedUsers()->sync($validated['assigned_user_ids'] ?? []);

        return redirect()->route('projects.show', $projectId)->with('success', 'Task updated successfully.');
    }
    // public function show(Project $project)
    // {
    //     $project->load('users', 'tasks');
    //     return view('projects.show', compact('project'));
    // }
    public function destroy($projectId, Task $task)
    {
        $task->assignedUsers()->detach();
        $task->delete();
        return back()->with('success', 'Task deleted');
    }

    public function showTasksForProject($projectId)
    {
        $project = Project::with(['tasks.assignedUsers'])->findOrFail($projectId);
        return view('tasks.index', compact('project'));
    }
}
