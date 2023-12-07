<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Employee;
use App\Models\EmployeeAddress;
use App\Models\HelperModel;
use App\Models\User;
use Avlima\PhpCpfCnpjGenerator\Generator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class EmployeeSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::where('isAdmin',0)->get();
        foreach($users as $user){
            $cpf = Generator::cpf(true);
            $cpfVerify = Employee::whereCpf($cpf)->first();
            $emailVerify = Employee::whereEmail($user->email)->first();
            if(!$cpfVerify && !$emailVerify){
                $create = HelperModel::setData(Employee::class,[
                    'name' => $user->name,
                    'cpf' => $cpf,
                    'email' => $user->email,
                    'company_id' => $user->company_id,
                    'address' => fake()->address(),
                    'job_title_id' => Arr::random($user->company->jobTitles->pluck('id')->toArray())
                ]);
                if($create){
                    HelperModel::setData(EmployeeAddress::class,[
                        'postcode' => fake()->postcode(),
                        'street' => fake()->streetAddress(),
                        'city' => fake()->city(),
                        'state' => fake()->citySuffix(),
                        'number' => rand(1,1970),
                        'employee_id' => $create->id
                    ]);
                }
            }

        }
        // $companies = Company::get();
        // foreach ($companies as $company) {
        //     for ($i = 0; $i < rand(100,300); $i++) {
        //         $name = fake()->name();
        //         $cpf = Generator::cpf(true);
        //         $cpfVerify = Employee::whereCpf($cpf)->first();
        //         $email = self::generateEmail($name);
        //         $emailVerify = Employee::whereEmail($email)->first();
        //         if (!$cpfVerify && !$emailVerify) {
        //             $create = HelperModel::setData(Employee::class, [
        //                 'name' => str_replace([' ', 'Dr.', 'Sr.', 'Srta.', 'Sra.','Jr.'],' ',$name),
        //                 'cpf' => $cpf,
        //                 'email' => $email,
        //                 'company_id' => $company->id,
        //                 'address' => fake()->address(),
        //                 'job_title_id' => Arr::random($company->jobTitles->pluck('id')->toArray())
        //             ]);
        //             if($create){
        //                 HelperModel::setData(EmployeeAddress::class,[
        //                     'postcode' => fake()->postcode(),
        //                     'street' => fake()->streetAddress(),
        //                     'city' => fake()->city(),
        //                     'state' => fake()->citySuffix(),
        //                     'number' => rand(1,1970),
        //                     'employee_id' => $create->id
        //                 ]);
        //             }
        //         }
        //     }
        // }
    }

    private static function generateEmail($name)
    {
        $name = iconv('UTF-8', 'ASCII//TRANSLIT', $name);
        $name =  preg_replace('/[^a-zA-Z0-9]/', '', strtolower(str_replace([' ', 'Dr.', 'Sr.', 'Srta.', 'Sra.'], '', $name)));
        return $name . '@' . Arr::random([fake()->freeEmailDomain()]);
    }
}
