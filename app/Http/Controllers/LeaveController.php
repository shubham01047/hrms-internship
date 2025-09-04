<?php

namespace App\Http\Controllers;

use App\Mail\LeaveAppliedMail;
use App\Mail\LeaveApprovedMail;
use App\Mail\LeaveRejectedMail;
use App\Models\User;
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
        $leaveBalance = auth()->user()->leave_balance;
        return view('leaves.create', compact('leaveTypes', 'leaveBalance'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'leave_type_id' => 'required|exists:leave_types,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'reason' => 'required|string',
            'proof_sick' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $days = Carbon::parse($request->start_date)
            ->diffInDays(Carbon::parse($request->end_date)) + 1;

        $leaveType = LeaveType::find($request->leave_type_id);

        if (strtolower($leaveType->name) === 'sick' && $days > 3) {
            $request->validate([
                'proof_sick' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            ]);
        }

        $proofPath = null;
        if ($request->hasFile('proof_sick')) {
            $proofPath = $request->file('proof_sick')->store('sick_proofs', 'public');
        }

        $leave = Leave::create([
            'user_id' => auth()->id(),
            'leave_type_id' => $request->leave_type_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'reason' => $request->reason,
            'status' => 'pending',
            'applied_on' => now(),
            'proof_sick' => $proofPath,
        ]);
        $admin = User::role('Superadmin')->first();
        if ($admin) {
            Mail::to($admin->email)
                ->cc($leave->user->teamLead->email ?? null)
                ->send(new LeaveAppliedMail($leave));
        }
        return redirect()->route('leaves.index')->with('success', 'Leave request submitted.');
    }


    public function manage()
    {
        $leaves = Leave::with('user', 'leaveType')->where('status', 'pending')->get();
        return view('leaves.manage', compact('leaves'));
    }
    public function viewLeave($filename)
    {
        $path = storage_path("app/public/sick_proofs/{$filename}");
        if (!file_exists($path)) {
            abort(404, "File not found: $path");
        }
        if (!auth()->check()) {
            abort(403, 'Unauthorized');
        }
        return response()->file($path);
    }
    public function approve($id)
    {
        $leave = Leave::with('user')->findOrFail($id);
        $leaveDays = Carbon::parse($leave->start_date)->diffInDays(Carbon::parse($leave->end_date)) + 1;
        $user = $leave->user;
        if ($user->leave_balance < $leaveDays) {
            return redirect()->back()->with('error', 'User does not have enough leave balance.');
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
        Mail::to($leave->user->email)->send(new LeaveRejectedMail($leave));
        return redirect()->back()->with('error', 'Leave rejected and email sent successfully.');
    }
}
