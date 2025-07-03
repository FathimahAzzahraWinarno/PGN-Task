<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employee::create([
            'employee_name' => 'Fathimah',
            'department_id' => 1,
        ]);

        Employee::create([
            'employee_name' => 'Azzahra',
            'department_id' => 2,
        ]);

        Employee::create([
            'employee_name' => 'Winarno',
            'department_id' => 3,
        ]);

        Employee::create([
            'employee_name' => 'Hafizh',
            'department_id' => 4,
        ]);

        Employee::create([
            'employee_name' => 'Medina',
            'department_id' => 5,
        ]);

        Employee::create([
            'employee_name' => 'Hanif',
            'department_id' => 6,
        ]);
    }
}
