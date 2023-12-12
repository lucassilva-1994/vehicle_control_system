<?php

namespace Database\Seeders;

use App\Models\HelperModel;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
                ['name' => 'create_employee','description' => 'Cadastrar funcionário.'],
                ['name' => 'show_employee','description' => 'Visualizar funcionário.'],
                ['name' => 'update_employee','description' => 'Atualizar funcionário.'],
                ['name' => 'delete_employee','description' => 'Deletar funcionário.'],
                ['name' => 'create_service','description' => 'Cadastrar serviço.'],
                ['name' => 'show_service','description' => 'Visualizar serviço.'],
                ['name' => 'update_service','description' => 'Atualizar serviço.'],
                ['name' => 'delete_service','description' => 'Deletar serviço.'],
                ['name' => 'create_vehicle','description' => 'Cadastrar veículo.'],
                ['name' => 'show_vehicle','description' => 'Visualizar veículo.'],
                ['name' => 'update_vehicle','description' => 'Atualizar veículo.'],
                ['name' => 'delete_vehicle','description' => 'Deletar veículo.'],
        ];

        foreach($roles as $role){
            HelperModel::setData(Role::class,$role);
        }

        foreach(User::get() as $user){
            foreach(Role::get() as $role){
                DB::table('role_user')->insert([
                    ['user_id' => $user->id, 'role_id' => $role->id]
                ]);
            }
        }
    }
}
