<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Timesheet;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TimesheetApiController extends Controller
{
    private function getTaskOrFail($projectId, $taskId)
    {
        return Task::where('project_id', $projectId)->findOrFail($taskId);
    }

    public function index($projectId, $taskId)
    {
        $task = $this->getTaskOrFail($projectId, $taskId);
        $timesheets = Timesheet::where('task_id', $task->id)
            ->where('project_id', $projectId)
            ->with('user')
            ->get();
        return response()->json([
            'success' => true,
            'data' => $timesheets
        ]);
    }
    public function store(Request $request, $projectId, $taskId)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'hours_worked' => 'required|numeric|min:0|max:24',
            'description' => 'nullable|string',
            'status' => 'nullable|in:Submitted,Approved,Rejected',
        ]);
        $validated['user_id'] = Auth::id();
        $validated['task_id'] = $taskId;
        $validated['project_id'] = $projectId;
        $validated['status'] = $validated['status'] ?? 'Submitted';
        $timesheet = Timesheet::create($validated);
        return response()->json([
            'success' => true,
            'message' => 'Timesheet submitted successfully.',
            'data' => $timesheet->load('user')
        ], 201);
    }
    public function show($projectId, $taskId, $id)
    {
        $this->getTaskOrFail($projectId, $taskId);
        $timesheet = Timesheet::with('user')
            ->where('project_id', $projectId)
            ->where('task_id', $taskId)
            ->findOrFail($id);
        return response()->json([
            'success' => true,
            'data' => $timesheet
        ]);
    }
    public function update(Request $request, $projectId, $taskId, $id)
    {
        $this->getTaskOrFail($projectId, $taskId);
        $timesheet = Timesheet::where('project_id', $projectId)
            ->where('task_id', $taskId)
            ->findOrFail($id);
        if (Auth::id() !== $timesheet->user_id && !Auth::user()->hasRole('Admin')) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 403);
        }
        $validated = $request->validate([
            'date' => 'required|date',
            'hours_worked' => 'required|numeric|min:0|max:24',
            'description' => 'nullable|string',
            'status' => 'nullable|in:Submitted,Approved,Rejected',
        ]);
        $timesheet->update($validated);
        return response()->json([
            'success' => true,
            'message' => 'Timesheet updated successfully.',
            'data' => $timesheet->load('user')
        ]);
    }
    public function approve($id)
    {
        $timesheet = Timesheet::findOrFail($id);
        abort_unless(auth()->user()->can('approve timesheet'), 403);

        $timesheet->update(['status' => 'Approved']);

        return response()->json([
            'success' => true,
            'message' => 'Timesheet approved.'
        ]);
    }
    public function reject($id)
    {
        $timesheet = Timesheet::findOrFail($id);
        abort_unless(auth()->user()->can('reject timesheet'), 403);

        $timesheet->update(['status' => 'Rejected']);

        return response()->json([
            'success' => true,
            'message' => 'Timesheet rejected.'
        ]);
    }
}
