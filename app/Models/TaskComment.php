<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TaskComment extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'task_id',
        'user_id',
        'comment',
        'commented_at',
    ];
    protected $dates = ['commented_at', 'deleted_at'];
    public function task()
    {
        return $this->belongsTo(Task::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
