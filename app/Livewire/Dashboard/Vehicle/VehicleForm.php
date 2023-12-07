<?php

namespace App\Livewire\Dashboard\Vehicle;

use App\Models\HelperModel;
use App\Models\Vehicle;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;

class VehicleForm extends Component
{
    public $vehicle;
    #[Rule('required|min:3')]
    public $brand;
    #[Rule('required')] 
    public $model;
    #[Rule('required')]
    public $color;
    #[Rule("required|numeric|between:1990,2023")]
    public $year;
    #[Rule('required|unique:vehicles,plate')]
    public $plate; 
    #[Rule('required|unique:vehicles,renavan')]
    public $renavan;
    public $user_id;
    public $company_id;

    public function mount(string $id = null)
    {
        $vehicle = Vehicle::find($id);
        if($vehicle){
            $this->vehicle = $vehicle->id;
            $this->brand = $vehicle->brand;
            $this->model = $vehicle->model;
            $this->color = $vehicle->color;
            $this->year = $vehicle->year;
            $this->plate = $vehicle->plate;
            $this->renavan = $vehicle->renavan;
        }
        $this->user_id = auth()->user()->id;
        $this->company_id = auth()->user()->company_id;
    }

    public function update(){
        $this->validate();
    }

    public function delete(string $id){
        Vehicle::find($id)->delete();
        return session()->flash('success','Veículo excluído com sucesso.');
    }

    public function create()
    {
        $this->validate();
        HelperModel::setData(Vehicle::class, [
            'brand' => $this->brand,
            'model' => $this->model,
            'color' => $this->color,
            'year' => $this->year,
            'plate' => $this->plate,
            'renavan' => $this->renavan,
            'created_by' => $this->user_id,
            'company_id' => $this->company_id
        ]);
        return $this->redirect(route('vehicle.form'), navigate: true);
    }
    #[Layout('livewire.dashboard.layout')]
    public function render()
    {
        $vehicles = Vehicle::orderBy('order', 'DESC')->whereCompanyId($this->company_id)->limit(10)->get();
        return view('livewire.dashboard.vehicle.vehicle-form', ['vehicles' => $vehicles]);
    }
}
