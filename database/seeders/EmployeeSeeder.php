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
        $states = ['AC', 'AL', 'AP', 'AM', 'BA', 'CE', 'DF', 'ES', 'GO', 'MA', 'MT', 'MS', 'MG', 'PA', 'PB', 'PR', 'PE', 'PI', 'RJ', 'RN', 'RS', 'RO', 'RR', 'SC', 'SP', 'SE', 'TO'];
        
        $companies = Company::get();
        foreach ($companies as $company) {
            for ($i = 0; $i < rand(100,300); $i++) {
                $name = fake()->name();
                $cpf = Generator::cpf(true);
                $cpfVerify = Employee::whereCpf($cpf)->first();
                $email = self::generateEmail($name);
                $emailVerify = Employee::whereEmail($email)->first();
                if (!$cpfVerify && !$emailVerify) {
                    $create = HelperModel::setData(Employee::class, [
                        'name' => $name,
                        'cpf' => $cpf,
                        'email' => $email,
                        'company_id' => $company->id,
                        'job_title_id' => Arr::random($company->jobTitles->pluck('id')->toArray())
                    ]);
                    if($create){
                        HelperModel::setData(EmployeeAddress::class,[
                            'zipcode' => fake()->postcode(),
                            'street' => fake()->streetAddress(),
                            'city' => fake()->city(),
                            'state' => Arr::random($states),
                            'number' => rand(1,1970),
                            'employee_id' => $create->id
                        ]);
                    }
                }
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
