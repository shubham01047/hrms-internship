<?php

namespace App\Http\Controllers;

use App\Mail\TaskAssignedMail;
use App\Mail\TaskCompletedMail;
use App\Models\Task;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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
        $project = Project::with('users')->findOrFail($projectId);
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
            'hours_assigned' => 'nullable|numeric|min:0',
            'assigned_user_ids' => 'nullable|array',
            'assigned_user_ids.*' => 'exists:users,id',
        ]);
        $task = new Task();
        $task->project_id = $projectId;
        $task->title = $validated['title'];
        $task->description = $validated['description'] ?? null;
        $task->priority = $validated['priority'];
        $task->status = $validated['status'];
        $task->due_date = $validated['due_date'] ?? null;
        $task->hours_assigned = $validated['hours_assigned'] ?? null;
        $task->save();
        if (!empty($validated['assigned_user_ids'])) {
            $task->assignedUsers()->sync($validated['assigned_user_ids']);
            foreach ($task->assignedUsers as $user) {
                if ($user->email) {
                    Mail::to($user->email)->send(new TaskAssignedMail($task, $user));
                }
            }
        }
        return redirect()->route('projects.show', $projectId)
            ->with('success', 'Task created successfully.');
    }

    public function show($projectId, Task $task)
    {
        $task->load('assignedUsers');
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
            'hours_assigned' => 'nullable|numeric|min:0',
            'assigned_user_ids' => 'nullable|array',
        ]);
        $oldStatus = $task->status;
        $task->fill([
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'priority' => $validated['priority'],
            'status' => $validated['status'],
            'due_date' => $validated['due_date'] ?? null,
            'hours_assigned' => $validated['hours_assigned'] ?? null,
        ]);
        $task->save();
        $task->assignedUsers()->sync($validated['assigned_user_ids'] ?? []);
        if ($oldStatus !== 'Done' && $task->status === 'Done') {
            foreach ($task->assignedUsers as $user) {
                if ($user->email) {
                    Mail::to($user->email)->send(new TaskCompletedMail($task));
                }
            }
            $admin = User::role('Superadmin')->first();
            if ($admin && $admin->email) {
                Mail::to($admin->email)->send(new TaskCompletedMail($task));
            }
        }

        return redirect()->route('projects.show', $projectId)
            ->with('success', 'Task updated successfully & mail sent.');
    }

    public function destroy($projectId, Task $task)
    {
        $task->assignedUsers()->detach();
        $task->delete();
        return back()->with('success', 'Task deleted successfully.');
    }
    public function showTasksForProject($projectId)
    {
        $project = Project::with(['tasks.assignedUsers'])->findOrFail($projectId);
        return view('tasks.index', compact('project'));
    }
}
