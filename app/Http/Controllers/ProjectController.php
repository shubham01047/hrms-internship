<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use DB;
use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class ProjectController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:view project', only: ['index']),
            new Middleware('permission:edit project', only: ['edit']),
            new Middleware('permission:create project', only: ['create']),
            new Middleware('permission:delete project', only: ['destroy']),
        ];
    }
    public function index()
    {
        $projects = Project::with('members')->get();
        return view('projects.index', compact('projects'));
    }
    public function create()
    {
        $users = User::all();
        return view('projects.create', compact('users'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'client_name' => 'nullable|string|max:255',
            'budget' => 'nullable|numeric',
            'deadline' => 'nullable|date',
            'description' => 'nullable|string',
            'members' => 'nullable|array',
            'members.*' => 'exists:users,id',
        ]);
        $project = Project::create($validated);
        if ($request->has('members')) {
            $project->members()->sync($request->members);
        }
        return redirect()->route('projects.index')->with('success', 'Project created successfully.');
    }
    public function show(Project $project, Task $task = null)
    {
        $project->load('users', 'tasks');
        if ($task) {
            $task->load('assignedUsers');
        }
        return view('projects.show', compact('project', 'task'));
    }
    public function edit(Project $project)
    {
        $users = User::all();
        $project->load('members');
        return view('projects.edit', compact('project', 'users'));
    }
    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'client_name' => 'nullable|string|max:255',
            'budget' => 'nullable|numeric',
            'deadline' => 'nullable|date',
            'description' => 'nullable|string',
            'members' => 'nullable|array',
            'members.*' => 'exists:users,id',
        ]);
        $project->update($validated);
        if ($request->has('members')) {
            $project->members()->sync($validated['members']);
            $taskIds = $project->tasks()->pluck('id');
            \DB::table('task_members')
                ->whereIn('task_id', $taskIds)
                ->whereNotIn('user_id', $validated['members']) 
                ->delete();
        }
        return redirect()->route('projects.index')->with('success', 'Project updated successfully.');
    }
    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Project deleted successfully.');
    }
}

