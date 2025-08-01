<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Timesheet extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'user_id',
        'task_id',
        'date',
        'hours_worked',
        'description',
        'status',
    ];
    // protected $dates = ['date', 'created_at', 'updated_at', 'deleted_at'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}
