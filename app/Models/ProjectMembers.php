<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectMembers extends Model
{
    protected $fillable = ['project_id', 'user_id'];


    public function project()
    {
        return $this->belongsTo(\App\Models\Project::class);
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

}

