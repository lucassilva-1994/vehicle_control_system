<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;

class SignIn extends Component
{
    #[Rule('required|exists:users,email')]
    public $email;
    #[Rule('required')]
    public $password;

    public function auth(){
        $this->validate();
        $credentials = $this->only(['email','password']);
        if(!User::whereEmail($this->email)->first()->employee->deleted){
            if(Auth::attempt($credentials)){
                return $this->redirect(route('vehicle.show'),navigate:true);
            }
            return session()->flash('error','Falha na autenticação.');
        }
        return session()->flash('error','Usuário inativo.');
    }
    public function render()
    {
        return view('livewire.sign-in');
    }
}
