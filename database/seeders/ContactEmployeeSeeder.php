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
                'name' => $employee->name,
                'email' => $employee->email,
                'phone_number' => fake()->phoneNumber(),
                'employee_id' => $employee->id
            ]);
            for($i=0;$i<2;$i++){
                $name = fake()->name();
                HelperModel::setData(ContactEmployee::class,[
                    'name' => $name,
                    'email' => self::generateEmail($name),
                    'phone_number' => fake()->phoneNumber(),
                    'employee_id' => $employee->id
                ]);
            }
        }
    }

    private static function generateEmail($name)
    {
        $name = iconv('UTF-8', 'ASCII//TRANSLIT', $name);
        $name =  preg_replace('/[^a-zA-Z0-9]/', '', strtolower(str_replace([' ', 'Dr.', 'Sr.', 'Srta.', 'Sra.'], '', $name)));
        return $name . '@' . Arr::random([fake()->freeEmailDomain()]);
    }
}
