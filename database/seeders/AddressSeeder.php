<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Company;
use App\Models\HelperModel;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    public function run(): void
    {
        $companies = Company::get();
        foreach($companies as $company){
            HelperModel::setData(Address::class,[
                'address' => fake()->streetAddress(),
                'post_code' => fake()->postcode(),
                'city' => fake()->city(),
                'company_id' => $company->id
            ]);
        }
    }
}
