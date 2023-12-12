<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\HelperModel;
use App\Models\Vehicle;
use Illuminate\Database\Seeder;
use Faker\Provider\Fakecar;
use Illuminate\Support\Arr;

class VehicleSeeder extends Seeder
{

    public function run(): void
    {
        $companies = Company::get();
        foreach ($companies as $company) {
            $colors = ['Vermelho', 'Verde', 'Azul', 'Amarelo', 'Laranja', 'Roxo', 'Rosa', 'Marrom', 'Preto', 'Branco', 'Cinza', 'Ciano', 'Magenta', 'Ouro', 'Prata', 'Turquesa', 'Lima', 'Aqua', 'Oliva', 'Marfim', 'Salmon', 'Teal', 'Chocolate', 'Índigo', 'Verde Oliva', 'Violeta', 'Dourado', 'Bege', 'Verde Limão'];
            for ($i = 0; $i < 20; $i++) {
                $plate = self::generatePlate();
                $renavan = rand(11111111111,99999999999);
                $plateUnique = Vehicle::wherePlate($plate)->first();
                $renavanUnique = Vehicle::whereRenavan($renavan)->first();
                $fakeCar = Fakecar::vehicleArray();
                if(!$plateUnique && !$renavanUnique){
                    HelperModel::setData(Vehicle::class, [
                        'brand' => $fakeCar['brand'],
                        'model' => $fakeCar['model'],
                        'plate' => $plate,
                        'year' => fake()->biasedNumberBetween(1990, date('Y'), 'sqrt'),
                        'color' => Arr::random($colors),
                        'type' => Fakecar::vehicleType(),
                        'renavan' => $renavan,
                        'company_id' => $company->id,
                        'created_by' => Arr::random($company->users->pluck('id')->toArray())
                    ]);
                }
            }
        }
    }

    public static function generatePlate() {
        $letras = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $numeros = '0123456789';
    
        // Três letras seguidas de quatro números
        $letrasAleatorias = substr(str_shuffle($letras), 0, 3);
        $numerosAleatorios = substr(str_shuffle($numeros), 0, 4);
    
        // Monta a placa no formato XXX-1234
        $plate = $letrasAleatorias . '-' . $numerosAleatorios;
    
        return $plate;
    }
}
