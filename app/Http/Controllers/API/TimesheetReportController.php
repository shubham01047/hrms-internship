<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Timesheet;
use Illuminate\Http\Request;

class TimesheetReportController extends Controller
{
    public function __invoke(Request $request, $projectId, $taskId)
    {
        $request->validate([
            'from' => 'required|date',
            'to' => 'required|date',
        ]);
        $timesheets = Timesheet::where('project_id', $projectId)
            ->where('task_id', $taskId)
            ->whereBetween('date', [$request->from, $request->to])
            ->with('user')
            ->get();
        return response()->json([
            'success' => true,
            'project_id' => $projectId,
            'task_id' => $taskId,
            'from' => $request->from,
            'to' => $request->to,
            'timesheets' => $timesheets,
        ]);
    }
}
