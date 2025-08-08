<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LeaveType extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'description'];

    public function leaves()
    {
        return $this->hasMany(Leave::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
