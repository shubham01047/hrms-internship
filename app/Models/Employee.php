<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
    'first_name', 'last_name', 'gender', 'date_of_birth', 'email', 'phone',
    'address', 'city', 'state', 'postal_code', 'country', 'joining_date',
    'employment_type', 'status', 'user_id', 'resume', 'id_proof'
];


}
