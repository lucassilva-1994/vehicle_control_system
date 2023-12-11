<?php

namespace App\Livewire\Dashboard\Employee;

use App\Models\Employee;
use App\Models\EmployeeAddress;
use App\Models\HelperModel;
use App\Models\JobTitle;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;

class EmployeeForm extends Component
{
    public $company_id;
    #[Rule('required')]
    public $name;
    #[Rule('required|unique:employees,cpf')]
    public $cpf;
    #[Rule('required|unique:employees,email')]
    public $email;
    #[Rule('required')]
    public $job_title_id;
    #[Rule('required')]
    public $zipcode;
    #[Rule('required')]
    public $street;
    #[Rule('required')]
    public $neighborhood;
    public $number;
    public $complement;
    #[Rule('required')]
    public $city;
    #[Rule('required')]
    public $state;

    public function findAddress()
    {
        $data = file_get_contents("https://viacep.com.br/ws/$this->zipcode/json/");
        $address = json_decode($data, 1);
        $this->street = $address['logradouro'];
        $this->neighborhood = $address['bairro'];
        $this->city = $address['localidade'];
        $this->state = $address['uf'];
        $this->number = 'S/N';
        $this->complement = $address['complemento'];
    }

    public function mount()
    {
        $this->company_id = auth()->user()->company_id;
    }

    public function create()
    {
        $this->validate();
        $employee = HelperModel::setData(Employee::class, [
            'name' => $this->name,
            'cpf' => $this->cpf,
            'email' => $this->email,
            'job_title_id' => $this->job_title_id,
            'company_id' => $this->company_id
        ]);
        if ($employee) {
            HelperModel::setData(EmployeeAddress::class,[
                'zipcode' => $this->zipcode,
                'street' => $this->street,
                'neighborhood' => $this->neighborhood,
                'number' => $this->number,
                'complement' => $this->complement,
                'city' => $this->city,
                'state' => $this->state,
                'employee_id' => $employee->id
            ]);
            $this->reset('name','cpf','email','cep','street','neighborhood','number','complement','city','state','job_title_id');
            return session()->flash('success', 'Colaborador cadastrado com sucesso.');
        }
        return session()->flash('error', 'Falha ao cadastrar funcionário.');
    }

    #[Layout('livewire.dashboard.layout')]
    public function render()
    {
        $jobTitles = JobTitle::orderBy('order', 'DESC')->whereCompanyId($this->company_id)->get();
        return view('livewire.dashboard.employee.employee-form', ['jobTitles' => $jobTitles]);
    }
}
