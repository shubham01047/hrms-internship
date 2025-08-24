<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use SoftDeletes;

    protected $table = "tasks";

    protected $fillable = [
        'project_id',
        'title',
        'description',
        'priority',
        'status',
        'due_date',
        'hours_assigned',
    ];
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
    public function assignedUsers()
    {
        return $this->belongsToMany(User::class, 'task_members', 'task_id', 'user_id');
    }
    public function timesheets()
    {
        return $this->hasMany(Timesheet::class);
    }
    public function comments()
    {
        return $this->hasMany(TaskComment::class);
    }
}
