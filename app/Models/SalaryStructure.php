<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SalaryStructure extends Model
{
    use SoftDeletes;
    protected $table = 'salary_structures';
    protected $fillable = [
        'user_id',
        'basic',
        'hra',
        'allowances',
        'tax',
        'pf',
        'esi'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
