<?php

namespace App\Livewire\Dashboard\User;
use App\Models\Employee;
use App\Models\JobTitle;
use App\Models\Vehicle;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class Profile extends Component
{
    use WithPagination;
    public $company_id;
    public $email;
    public function mount()
    {
        $this->company_id = auth()->user()->company_id;
        $this->email = auth()->user()->email;
    }
    
    #[Layout('livewire.dashboard.layout')]
    public function render()
    {
        $employee = Employee::whereEmail($this->email)->first();
        $employees = Employee::whereCompanyId($this->company_id)->paginate(30);
        $vehicles = Vehicle::orderBy('order','DESC')->whereCompanyId($this->company_id)->paginate(30);
        $jobTitles = JobTitle::withCount('employees')->orderBy('employees_count','DESC')->whereCompanyId($this->company_id)->paginate(30);
        return view(
            'livewire.dashboard.user.profile',
            ['employees' => $employees,'vehicles'=> $vehicles, 'job_titles' => $jobTitles,'employee' => $employee]
        );
    }
}
