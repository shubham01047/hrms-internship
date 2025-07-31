<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Employee;

class BackfillEmployees extends Command
{
    protected $signature = 'backfill:employees';
    protected $description = 'Create employee records for users with employee role if missing';

    public function handle()
    {
        $users = User::role('employee')->doesntHave('employee')->get();
        $count = 0;

        foreach ($users as $user) {
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
            $count++;
        }

        $this->info("Backfilled $count employee(s).");
    }
}
