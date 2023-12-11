<?php

namespace App\Livewire\Dashboard\Service;

use App\Models\Service;
use Livewire\Attributes\Layout;
use Livewire\Component;

class ServiceShow extends Component
{
    public $company_id;
    public $perPage = 10;

    public function loadMore(){
        return $this->perPage += 20;
    }

    public function mount(){
        $this->company_id = auth()->user()->company_id;
    }

    #[Layout('livewire.dashboard.layout')]
    public function render()
    {
        $services = Service::whereCompanyId($this->company_id)->paginate($this->perPage);
        return view('livewire.dashboard.service.service-show',['services' => $services]);
    }
}
