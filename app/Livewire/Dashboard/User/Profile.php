<?php

namespace App\Livewire\Dashboard\User;
use App\Models\Employee;
use App\Models\JobTitle;
use App\Models\User;
use App\Models\Vehicle;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class Profile extends Component
{
    use WithPagination;
    public $company_id;
    public $email;
    public $user_id;
    public function mount()
    {
        $this->company_id = auth()->user()->company_id;
        $this->email = auth()->user()->email;
        $this->user_id = auth()->user()->id;
    }
    
    #[Layout('livewire.dashboard.layout')]
    public function render()
    {
        $user = User::find($this->user_id);
        return view(
            'livewire.dashboard.user.profile', ['user' => $user]
        );
    }
}
