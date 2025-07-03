<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Spending;
use Carbon\Carbon;

class SpendingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Spending::create([
            'employee_id' => 1,
            'spending_date' => Carbon::create(2022, 4, 10),
            'value' => 120000
        ]);

        Spending::create([
            'employee_id' => 2,
            'spending_date' => Carbon::create(2022, 1, 19),
            'value' => 320000
        ]);

        Spending::create([
            'employee_id' => 3,
            'spending_date' => Carbon::create(2021, 8, 14),
            'value' => 140000
        ]);

        Spending::create([
            'employee_id' => 4,
            'spending_date' => Carbon::create(2021, 4, 18),
            'value' => 100000
        ]);

        Spending::create([
            'employee_id' => 5,
            'spending_date' => Carbon::create(2020, 3, 12),
            'value' => 200000
        ]);

        Spending::create([
            'employee_id' => 6,
            'spending_date' => Carbon::create(2020, 2, 20),
            'value' => 180000
        ]);

        // Tambahan tahun 2023
        Spending::create([
            'employee_id' => 1,
            'spending_date' => Carbon::create(2023, 5, 5),
            'value' => 150000
        ]);

        Spending::create([
            'employee_id' => 2,
            'spending_date' => Carbon::create(2023, 9, 12),
            'value' => 220000
        ]);

        // Tambahan tahun 2024
        Spending::create([
            'employee_id' => 3,
            'spending_date' => Carbon::create(2024, 1, 30),
            'value' => 300000
        ]);

        Spending::create([
            'employee_id' => 1,
            'spending_date' => Carbon::create(2024, 12, 15),
            'value' => 175000
        ]);

        // Tambahan tahun 2025
        Spending::create([
            'employee_id' => 2,
            'spending_date' => Carbon::create(2025, 7, 20),
            'value' => 250000
        ]);

        Spending::create([
            'employee_id' => 3,
            'spending_date' => Carbon::create(2025, 2, 28),
            'value' => 400000
        ]);
    }
}
