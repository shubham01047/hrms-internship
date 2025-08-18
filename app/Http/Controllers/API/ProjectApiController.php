<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectApiController extends Controller
{
    public function index()
    {
        $projects = Project::with('members')->get();
        return response()->json([
            'success' => true,
            'data' => $projects
        ]);
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
        return response()->json([
            'success' => true,
            'message' => 'Project created successfully.',
            'data' => $project->load('members')
        ], 201);
    }
    public function show($id)
    {
        $project = Project::with(['members', 'tasks'])->findOrFail($id);
        return response()->json([
            'success' => true,
            'data' => $project
        ]);
    }
    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);

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
            DB::table('task_members')
                ->whereIn('task_id', $taskIds)
                ->whereNotIn('user_id', $validated['members'])
                ->delete();
        }
        return response()->json([
            'success' => true,
            'message' => 'Project updated successfully.',
            'data' => $project->load('members')
        ]);
    }
    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return response()->json([
            'success' => true,
            'message' => 'Project deleted successfully.'
        ]);
    }
}
