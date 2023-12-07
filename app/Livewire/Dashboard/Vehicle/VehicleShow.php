<?php

namespace App\Livewire\Dashboard\Vehicle;

use App\Models\Vehicle;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class VehicleShow extends Component
{
    use WithPagination;
    public $perPage = 10;
    public $company_id;
    public $search;

    public function mount(){
        $this->company_id = auth()->user()->company_id;
    }

    #[Layout('livewire.dashboard.layout')]
    public function render()
    {
        $vehicles = Vehicle::whereCompanyId($this->company_id)
        ->paginate($this->perPage);
        $this->resetPage();
        return view('livewire.dashboard.vehicle.vehicle-show',['vehicles' => $vehicles]);
    }
}
