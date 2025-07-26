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
        'punch_out',
        'total_working_hours',
    ];
    public function breaks()
    {
        return $this->hasMany(BreakModel::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
