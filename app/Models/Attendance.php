<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = 'attendance';
    protected $fillable = [
    'user_id',
    'date',
    'punch_in',
    'punch_in_remarks',
    'punch_out',
    'punch_out_remarks',
    'total_working_hours',
    'punch_in_again',
    'punch_in_again_remarks',
    'punch_out_again',
    'punch_out_again_remarks',
    'overtime_working_hours',
];

    public function breaks()
    {
        return $this->hasMany(BreakModel::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    protected $casts = [
        'date' => 'date',
        'punch_in' => 'datetime',
        'punch_out' => 'datetime',
    ];

}
