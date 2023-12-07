<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\HelperModel;
use Illuminate\Database\Seeder;
use Avlima\PhpCpfCnpjGenerator\Generator;

class CompanySeeder extends Seeder
{
    public function run(): void
    {
        for($i=0;$i<100;$i++){
            $cnpj = Generator::cnpj(true);
            $company= Company::whereCnpj($cnpj)->first();
            $legal_name = fake()->unique(0,100000000)->company();
            if(!$company){
                HelperModel::setData(Company::class,[
                    'trade_name' => fake()->unique()->company(),
                    'legal_name' => $legal_name,
                    'cnpj' => $cnpj,
                    'contact_phone' => fake()->phoneNumber(),
                    'mobile_phone' => fake()->phoneNumber(),
                    'contact_email' => self::removeAccents($legal_name).'@'.fake()->freeEmailDomain,
                    'created_at' => fake()->dateTimeThisYear()
                ]);
            }
        }
    }


    private static function removeAccents($name){
        $name = iconv('UTF-8','ASCII//TRANSLIT',$name);
        $name =  preg_replace('/[^a-zA-Z0-9]/', '', strtolower(str_replace([' ','Dr.','Sr.','Srta.','Sra.'], '', $name)));
        return $name;
    }
}
