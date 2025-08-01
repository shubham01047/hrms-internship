<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'client_name',
        'budget',
        'deadline',
        'description'
    ];

    protected $dates = ['deadline'];

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
    return $this->belongsToMany(User::class, 'project_members');
}

}
