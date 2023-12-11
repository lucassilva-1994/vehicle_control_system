<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Employee;
use App\Models\HelperModel;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class UserSeeder extends Seeder
{

    public function run(): void
    {
        $employees = Employee::get();
        foreach($employees as $employee){
            $emailVerify = User::whereEmail($employee->email)->first();
            if (!$emailVerify) {
                HelperModel::setData(User::class, [
                    'name' => $employee->name,
                    'username' => self::generateUserName($employee->name),
                    'email' => $employee->email,
                    'password' => '12345678910',
                    'employee_id' => $employee->id,
                    'isAdmin' => 0,
                    'company_id' => $employee->company_id
                ]);
            }
        }
    }

    private static function generateUserName($name)
    {
        $name = iconv('UTF-8', 'ASCII//TRANSLIT', $name);
        $name =  preg_replace('/[^a-zA-Z0-9]/', '', strtolower(str_replace([' ', 'Dr.', 'Sr.', 'Srta.', 'Sra.'], '', $name)));
        return $name;
    }

    private static function generateEmail($name)
    {
        $name = iconv('UTF-8', 'ASCII//TRANSLIT', $name);
        $name =  preg_replace('/[^a-zA-Z0-9]/', '', strtolower(str_replace([' ', 'Dr.', 'Sr.', 'Srta.', 'Sra.'], '', $name)));
        return $name . '@' . Arr::random([fake()->freeEmailDomain()]);
    }
}
