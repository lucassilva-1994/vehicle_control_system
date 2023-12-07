<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\HelperModel;
use App\Models\JobTitle;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class JobTitleSeeder extends Seeder
{
    public function run(): void
    {
        $companies = Company::get();
        foreach($companies as $company){
            for($i=0;$i<random_int(10,60); $i++){
                HelperModel::setData(JobTitle::class,[
                    'name' => fake('en_US')->jobTitle(),
                    'company_id' => $company->id,
                    'created_by' => Arr::random($company->users->pluck('id')->toArray())
                ]);
            }
        }
    }
}
