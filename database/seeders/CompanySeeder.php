<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;

class CompanySeeder extends Seeder
{
    public function run(): void
    {
        Company::create([
            'name' => 'My HR Company',
            'description' => 'Human Resource Management System',
            'system_title' => 'HRMS',
            'logo' => 'images/logo.png',
        ]);
    }
}
