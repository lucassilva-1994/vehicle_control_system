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
            JobTitleSeeder::class,
            EmployeeSeeder::class,
            UserSeeder::class,
            ContactEmployeeSeeder::class,
            VehicleSeeder::class,
            ServicesSeeder::class,
            RolesSeeder::class,
        ]);
    }
}
