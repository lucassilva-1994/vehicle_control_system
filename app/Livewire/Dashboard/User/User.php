<?php

namespace App\Livewire\Dashboard\User;

use App\Models\Role;
use App\Models\User as ModelsUser;
use Livewire\Attributes\Layout;
use Livewire\Component;

class User extends Component
{
    public $user_id;
    public $permission = [];
    public function mount(string $id){
        $this->user_id = $id;
    }

    #[Layout('livewire.dashboard.layout')]
    public function render()
    {
        $user = ModelsUser::find($this->user_id);
        if($user){
            $this->permission = $user->roles->pluck('id')->toArray();
        }
        return view('livewire.dashboard.user.user',[
            'roles' => $this->roles(),
            'user' => $user
        ]);
    }

    private function roles(){
        return Role::get();
    }
}
