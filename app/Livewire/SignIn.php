<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;

class SignIn extends Component
{
    #[Rule('required')]
    public $email, $password;

    public function auth(){
        $this->validate();
        $credentials = $this->only(['email','password']);
        if(Auth::attempt($credentials)){
            return $this->redirect(route('vehicle.show'),navigate:true);
            //return session()->flash('success','Autenticação feito com sucesso...');
        }
        return session()->flash('error','Falha na autenticação.');
    }
    public function render()
    {
        return view('livewire.sign-in');
    }
}
