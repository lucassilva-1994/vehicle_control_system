<?php

namespace Database\Seeders;

use App\Models\ContactEmployee;
use App\Models\Employee;
use App\Models\HelperModel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class ContactEmployeeSeeder extends Seeder
{
    public function run(): void
    {
        $employees = Employee::get();
        foreach($employees as $employee){
            HelperModel::setData(ContactEmployee::class,[
                'name_contact' => $employee->name,
                'phone_number' => fake()->phoneNumber(),
                'employee_id' => $employee->id
            ]);
            for($i=0;$i<Arr::random([1,7]);$i++){
                HelperModel::setData(ContactEmployee::class,[
                    'name_contact' => fake()->name(),
                    'phone_number' => fake()->phoneNumber(),
                    'employee_id' => $employee->id
                ]);
            }
        }
    }
}
