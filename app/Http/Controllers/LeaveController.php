<?php

namespace App\Http\Controllers;

use App\Mail\LeaveApprovedMail;
use Illuminate\Http\Request;
use App\Models\Leave;
use App\Models\LeaveType;
use App\Notifications\LeaveApprovedNotification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class LeaveController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:apply leave', only: ['create']),
            new Middleware('permission:approve leave', only: ['manage']),
            new Middleware('permission:view all leaves', only: ['index']),
        ];
    }
    public function index()
    {
        $leaves = Leave::with('leaveType')->where('user_id', auth()->id())->get();
        return view('leaves.index', compact('leaves'));
    }
    public function create()
    {
        $leaveTypes = LeaveType::all();
        return view('leaves.create', compact('leaveTypes'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'leave_type_id' => 'required|exists:leave_types,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'reason' => 'required|string',
        ]);
        Leave::create([
            'user_id' => auth()->id(),
            'leave_type_id' => $request->leave_type_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'reason' => $request->reason,
            'status' => 'pending',
            'applied_on' => now(),
        ]);
        return redirect()->route('leaves.index')->with('success', 'Leave request submitted.');
    }
    public function manage()
    {
        $leaves = Leave::with('user', 'leaveType')->where('status', 'pending')->get();
        return view('leaves.manage', compact('leaves'));
    }
    public function approve($id)
    {
        $leave = Leave::with('user')->findOrFail($id);
        $leaveDays = Carbon::parse($leave->start_date)->diffInDays(Carbon::parse($leave->end_date)) + 1;
        $user = $leave->user;
        if ($user->leave_balance < $leaveDays) {
            return response()->json(['error' => 'User does not have enough leave balance.'], 400);
        }
        $user->leave_balance -= $leaveDays;
        $user->save();
        $leave = Leave::with('user')->findOrFail($id);
        $leave->status = 'Approved';
        $leave->approved_by = auth()->id();
        $leave->save();
        Mail::to($leave->user->email)->send(new LeaveApprovedMail($leave));
        return redirect()->back()->with('success', 'Leave approved and email sent successfully.');
    }
    public function reject($id)
    {
        $leave = Leave::findOrFail($id);
        $leave->update([
            'status' => 'rejected',
            'approved_by' => auth()->id(),
        ]);
        return redirect()->back()->with('error', 'Leave rejected.');
    }
}
