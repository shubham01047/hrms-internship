<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Mail\LeaveApprovedMail;
use App\Models\Leave;
use App\Models\LeaveType;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class LeaveController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'leave_type_id' => 'required|exists:leave_types,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'reason' => 'required|string',
        ]);
        $leave = Leave::create([
            'user_id' => Auth::id(),
            'leave_type_id' => $request->leave_type_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'reason' => $request->reason,
            'status' => 'pending',
            'applied_on' => now(),
        ]);
        return response()->json(['message' => 'Leave applied successfully.', 'leave' => $leave], 201);
    }
    public function myLeaves()
    {
        $leaves = Leave::with('leaveType')->where('user_id', Auth::id())->get();
        return response()->json($leaves);
    }
    public function pending()
    {
        $leaves = Leave::with('user', 'leaveType')->where('status', 'pending')->get();
        return response()->json($leaves);
    }
    public function approve($id)
    {
        $leave = Leave::with('user')->findOrFail($id);
        if ($leave->status !== 'Pending') {
            return response()->json(['error' => 'Leave is not in pending status.'], 400);
        }
        $leaveDays = Carbon::parse($leave->start_date)->diffInDays(Carbon::parse($leave->end_date)) + 1;
        $user = $leave->user;
        if ($user->leave_balance < $leaveDays) {
            return response()->json(['error' => 'User does not have enough leave balance.'], 400);
        }
        $user->leave_balance -= $leaveDays;
        $user->save();
        $leave->status = 'Approved';
        $leave->approved_by = Auth::id();
        $leave->save();
        Mail::to($leave->user->email)->send(new LeaveApprovedMail($leave));
        return response()->json(['message' => 'Leave approved successfully.']);
    }
    public function reject($id)
    {
        $leave = Leave::findOrFail($id);
        if ($leave->status !== 'Pending') {
            return response()->json(['error' => 'Leave is not in pending status.'], 400);
        }
        $leave->update([
            'status' => 'rejected',
            'approved_by' => Auth::id(),
        ]);
        return response()->json(['message' => 'Leave rejected.']);
    }
    public function report()
    {
        $report = Leave::with('user', 'leaveType')->get();
        return response()->json($report);
    }
}
