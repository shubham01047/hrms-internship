<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payroll extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id', 'month', 'basic', 'hra', 'allowances',
        'tax_amount', 'pf_amount', 'esi_amount',
        'gross_salary', 'net_salary'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
