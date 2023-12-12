<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\HelperModel;
use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class ServicesSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            'Documentação',
            'Abastecimento',
            'Troca de óleo do motor',
            'Substituição do filtro de óleo',
            'Troca de filtro de ar',
            'Substituição das velas de ignição',
            'Alinhamento e balanceamento',
            'Troca de fluido de transmissão',
            'Troca de fluido de freio',
            'Troca de correia dentada',
            'Verificação e recarga do sistema de ar condicionado',
            'Inspeção dos freios (pastilhas, discos, tambores)',
            'Troca de pneus',
            'Rodízio de pneus',
            'Balanceamento de pneus',
            'Troca do filtro de combustível',
            'Verificação do sistema de direção',
            'Substituição da bomba de água',
            'Troca de juntas e vedações',
            'Inspeção e substituição das mangueiras do radiador',
            'Verificação do sistema de ignição',
            'Troca do líquido de arrefecimento',
            'Verificação e ajuste da folga das válvulas',
            'Inspeção do sistema de escapamento',
            'Limpeza do sistema de ventilação',
            'Troca do sensor de oxigênio',
            'Reparo ou substituição do alternador',
            'Troca do termostato',
            'Verificação do sistema de suspensão',
            'Substituição dos amortecedores',
            'Inspeção e lubrificação das articulações e buchas',
            'Verificação e substituição das luzes (faróis, lanternas, etc.)',
            'Troca do fluido da direção hidráulica',
            'Verificação do sistema de ignição',
            'Substituição das correias (correia do alternador, etc.)',
            'Inspeção do sistema de freio de estacionamento',
          ];
          $companies = Company::get();
          foreach($companies as $company){
                for($i=0; $i < 10; $i++){
                    HelperModel::setData(Service::class,[
                        'description' => Arr::random($services),
                        'value' => fake()->randomFloat(2,50,1500),
                        'company_id' => $company->id,
                        'vehicle_id' => Arr::random($company->vehicles->pluck('id')->toArray()),
                        'created_by' => Arr::random($company->users->pluck('id')->toArray()),
                        'executed_by' => Arr::random($company->employees->pluck('id')->toArray()),
                    ]);
                }
          }

    }
}
