<?php

// app/Models/Employee.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'name',
        'gender',
        'date_of_birth',
        'email',
        'phone',
        'address',
        'city',
        'state',
        'postal_code',
        'country',
        'joining_date',
        'employment_type',
        'status',
        'user_id',
        'resume',
        'id_proof'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
