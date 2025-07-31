<?php

namespace App\Observers;

use App\Models\User;
use App\Models\Employee;

class UserObserver
{
    public function saved(User $user)
    {
        // Auto-create if employee role is newly assigned and no Employee exists
        if ($user->hasRole('employee') && !$user->employee) {
            Employee::create([
                'user_id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'gender' => null,
                'date_of_birth' => null,
                'phone' => null,
                'address' => null,
                'city' => null,
                'state' => null,
                'postal_code' => null,
                'country' => null,
                'joining_date' => null,
                'employment_type' => 'full_time',
                'status' => 'active',
                'resume' => null,
                'id_proof' => null,
            ]);
        }

        // Delete employee if role removed
        if (!$user->hasRole('employee') && $user->employee) {
            $user->employee->delete();
        }
    }
}
