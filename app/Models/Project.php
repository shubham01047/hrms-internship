<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class Project extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'client_name',
        'budget',
        'deadline',
        'status',
        'description'
    ];

    protected $casts = [
        'deadline' => 'date',
    ];

    public function members()
    {
        return $this->belongsToMany(User::class, 'project_members')->withTimestamps();
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
    public function users()
    {
        return $this->members();
    }
}
