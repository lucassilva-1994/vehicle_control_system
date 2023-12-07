<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\HelperModel;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class UserSeeder extends Seeder
{

    public function run(): void
    {
        $companies = Company::get();
        foreach ($companies as $company) {
            HelperModel::setData(User::class, [
                'name' => $company->legal_name,
                'email' => $company->contact_email,
                'username' => self::generateUserName($company->legal_name),
                'isAdmin' => 1,
                'password' => '12345678910',
                'company_id' => $company->id
            ]);
        }

        for ($i = 0; $i < 5000; $i++) {
            $name = fake()->name();
            $email = self::generateEmail($name);
            $emailVerify = User::whereEmail($email)->first();
            if (!$emailVerify) {
                HelperModel::setData(User::class, [
                    'name' => $name,
                    'username' => self::generateUserName($name),
                    'email' => $email,
                    'password' => '12345678910',
                    'isAdmin' => 0,
                    'company_id' => Arr::random($companies->pluck('id')->toArray())
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
