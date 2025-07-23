<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Leave extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id', 'leave_type_id', 'start_date', 'end_date',
        'reason', 'status', 'applied_on', 'approved_by'
    ];

    protected $dates = ['start_date', 'end_date', 'applied_on'];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function leaveType()
    {
        return $this->belongsTo(LeaveType::class);
    }

    public function approver()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }
}
