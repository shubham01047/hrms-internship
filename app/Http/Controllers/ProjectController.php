<?php

namespace App\Http\Controllers;

use App\Mail\ProjectCompletedMail;
use App\Mail\ProjectCreatedMail;
use App\Models\Project;
use App\Models\User;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Mail;

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

    /**
     * List all projects
     */
    public function index()
    {
        $projects = Project::with('members')->get();
        return view('projects.index', compact('projects'));
    }

    /**
     * Show create project form
     */
    public function create()
    {
        $users = User::all();
        return view('projects.create', compact('users'));
    }
    /**
     * Store new project
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'client_name' => 'nullable|string|max:255',
            'budget' => 'nullable|numeric',
            'deadline' => 'nullable|date',
            'status' => 'required|in:To-Do,In Progress,On Hold,Done',
            'description' => 'nullable|string',
            'members' => 'nullable|array',
            'members.*' => 'exists:users,id',
        ]);
        $project = Project::create($validated);
        if ($request->has('members')) {
            $project->members()->sync($request->members);
        }
        $project->load('members');
        foreach ($project->members as $user) {
            if ($user->email) {
                Mail::to($user->email)->send(new ProjectCreatedMail($project));
            }
        }
        return redirect()->route('projects.index')->with('success', 'Project created successfully.');
    }
    /**
     * Show project details
     */
    public function show(Project $project, Task $task = null)
    {
        $project->load('members', 'tasks');
        if ($task) {
            $task->load('assignedUsers');
        }
        return view('projects.show', compact('project', 'task'));
    }

    /**
     * Show edit project form
     */
    public function edit(Project $project)
    {
        $users = User::all();
        $project->load('members');
        return view('projects.edit', compact('project', 'users'));
    }

    /**
     * Update project
     */


    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'client_name' => 'nullable|string|max:255',
            'budget' => 'nullable|numeric',
            'deadline' => 'nullable|date',
            'status' => 'required|in:To-Do,In Progress,On Hold,Done',
            'description' => 'nullable|string',
            'members' => 'nullable|array',
            'members.*' => 'exists:users,id',
        ]);
        $oldStatus = $project->status;
        $project->update($validated);
        if ($request->has('members')) {
            $project->members()->sync($validated['members']);
            $taskIds = $project->tasks()->pluck('id');
            \DB::table('task_members')
                ->whereIn('task_id', $taskIds)
                ->whereNotIn('user_id', $validated['members'])
                ->delete();
        }
        if ($oldStatus !== 'Done' && $project->status === 'Done') {
            foreach ($project->members as $user) {
                if ($user->email) {
                    Mail::to($user->email)->send(new ProjectCompletedMail($project));
                }
            }
            $admin = User::role('Superadmin')->first();
            if ($admin && $admin->email) {
                Mail::to($admin->email)->send(new ProjectCompletedMail($project));
            }
        }
        return redirect()->route('projects.index')->with('success', 'Project updated successfully & mail sent.');
    }


    /**
     * Delete project
     */
    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Project deleted successfully.');
    }
}
