<?php

namespace App\Livewire\Dashboard\Employee;

use App\Models\Employee;
use App\Models\HelperModel;
use App\Models\JobTitle;
use Livewire\Attributes\Layout;
use Livewire\Component;

class EmployeeForm extends Component
{
    public $company_id;
    public $name;
    public $cpf;
    public $email;
    public $job_title_id;
    public $cep;
    public $street;
    public $neighborhood;
    public $number;
    public $complement;
    public $city;
    public $state;

    public function findAddress(){
        $data = file_get_contents("https://viacep.com.br/ws/$this->cep/json/");
        $address = json_decode($data,1);
            $this->street = $address['logradouro'];
            $this->neighborhood = $address['bairro'];
            $this->city = $address['localidade'];
            $this->state = $address['uf'];
            $this->number = 'S/N';
            $this->complement = $address['complemento'];
    }

    public function mount(){
        $this->company_id = auth()->user()->company_id;
    }

    public function create(){
        $address = "$this->cep - $this->street, $this->neighborhood, $this->number, $this->complement, $this->city - $this->state";
        if(HelperModel::setData(Employee::class,[
            'name' => $this->name,
            'cpf' => $this->cpf,
            'email' => $this->email,
            'job_title_id' => $this->job_title_id,
            'address' => $address,
            'company_id' => $this->company_id
        ]))
            $this->reset();
            return session()->flash('success','Colaborador cadastrado com sucesso.');
        return session()->flash('error','Falha ao cadastrar funcionário.');
    }

    #[Layout('livewire.dashboard.layout')]
    public function render()
    {
        $jobTitles = JobTitle::orderBy('order','DESC')->whereCompanyId($this->company_id)->get();
        return view('livewire.dashboard.employee.employee-form',['jobTitles' => $jobTitles]);
    }
}
