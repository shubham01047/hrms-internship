<?php

namespace App\Observers;

use App\Models\User;
use App\Models\Employee;

class UserObserver
{
    public function saved(User $user)
    {
        // If user has "employee" role and no employee record exists
        if ($user->hasRole('employee') && !$user->employee) {
            Employee::create([
                'user_id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
            ]);
        }

        // If "employee" role removed, delete employee record
        if (!$user->hasRole('employee') && $user->employee) {
            $user->employee->delete();
        }
    }
}