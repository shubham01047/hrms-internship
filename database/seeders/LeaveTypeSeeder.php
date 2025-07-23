<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LeaveType;

class LeaveTypeSeeder extends Seeder
{
    public function run()
    {
        $types = [
            ['name' => 'Sick Leave', 'description' => 'Leave for illness'],
            ['name' => 'Casual Leave', 'description' => 'Personal short leave'],
            ['name' => 'Annual Leave', 'description' => 'Earned paid leave'],
            ['name' => 'Bereavement Leave', 'description' => 'For family loss/funeral'],
            ['name' => 'Unpaid Leave', 'description' => 'Without salary'],
            ['name' => 'Marriage Leave', 'description' => 'For personal wedding'],
            ['name' => 'Study Leave', 'description' => 'For exams or education'],
        ];

        foreach ($types as $type) {
            LeaveType::create($type);
        }
    }
}
