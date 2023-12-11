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
        // $job_titles_old = [
        //     'Diretor de Logística',
        //     'Coordenador de Frota e Transporte',
        //     'Supervisor de Operações Logísticas',
        //     'Especialista em Manutenção Preventiva',
        //     'Analista de Controle de Abastecimento',
        //     'Engenheiro de Veículos',
        //     'Analista de Eficiência de Rotas',
        //     'Gerente de Documentação e Licenciamento',
        //     'Analista de Compliance de Transportes',
        //     'Especialista em Análise de Dados de Veículos',
        //     'Coordenador de Programação de Manutenção',
        //     'Analista de Custos de Operação',
        //     'Especialista em Otimização de Rotas',
        //     'Analista de Telemetria e Diagnóstico Veicular',
        //     'Coordenador de Segurança de Frota',
        //     'Especialista em Sustentabilidade de Transportes',
        //     'Supervisor de Monitoramento de Veículos',
        //     'Despachante de Frota',
        //     'Engenheiro de Tráfego Urbano',
        //     'Técnico em Emissões Veiculares',
        //     'Especialista em Gestão de Seguros para Frotas',
        //     'Analista de Suporte a Motoristas',
        //     'Coordenador de Treinamento de Motoristas',
        // ];
        $job_titles = [
            'CEO (Chief Executive Officer)',
            'CFO (Chief Financial Officer)',
            'COO (Chief Operating Officer)',
            'CTO (Chief Technology Officer)',
            'CIO (Chief Information Officer)',
            'Diretor de Recursos Humanos',
            'Diretor de Marketing',
            'Diretor Comercial',
            'Diretor de Operações',
            'Diretor de Desenvolvimento de Negócios',
            'Gerente de Recursos Humanos',
            'Gerente Financeiro',
            'Gerente de Marketing',
            'Gerente Comercial',
            'Gerente de Operações',
            'Gerente de TI (Tecnologia da Informação)',
            'Analista de Recursos Humanos',
            'Analista Financeiro',
            'Analista de Marketing',
            'Analista Comercial',
            'Analista de Sistemas',
            'Especialista em Recrutamento e Seleção',
            'Especialista em Finanças',
            'Especialista em Marketing Digital',
            'Especialista em Vendas',
            'Especialista em TI',
            'Assistente Administrativo',
            'Assistente Financeiro',
            'Assistente de Marketing',
            'Assistente Comercial',
            'Assistente de TI',
            'Recepcionista',
            'Secretária Executiva',
            'Auxiliar Administrativo',
            'Auxiliar Financeiro',
            'Auxiliar de Marketing',
            'Auxiliar Comercial',
            'Auxiliar de TI',
        ];
        

        foreach ($companies as $company) {
            foreach ($job_titles as $job_title) {
                HelperModel::setData(JobTitle::class, [
                    'name' => $job_title,
                    'company_id' => $company->id,
                ]);
            }
        }
    }
}
