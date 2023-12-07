<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            CompanySeeder::class,
            AddressSeeder::class,
            UserSeeder::class,
            JobTitleSeeder::class,
            EmployeeSeeder::class,
            ContactEmployeeSeeder::class,
            VehicleSeeder::class
        ]);
    }
}
