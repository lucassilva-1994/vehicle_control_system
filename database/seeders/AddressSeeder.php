<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Company;
use App\Models\HelperModel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;


class AddressSeeder extends Seeder
{
    public function run(): void
    {
        $companies = Company::get();
        $states = ['AC', 'AL', 'AP', 'AM', 'BA', 'CE', 'DF', 'ES', 'GO', 'MA', 'MT', 'MS', 'MG', 'PA', 'PB', 'PR', 'PE', 'PI', 'RJ', 'RN', 'RS', 'RO', 'RR', 'SC', 'SP', 'SE', 'TO'];

        
        foreach($companies as $company){
            HelperModel::setData(Address::class,[
                'address' => fake()->streetAddress(),
                'zipcode' => fake()->postcode(),
                'city' => fake()->city(),
                'state' => Arr::random($states),
                'company_id' => $company->id
            ]);
        }
    }
}
