<?php

namespace App\Livewire\Dashboard\Employee;

use App\Models\Employee;
use App\Models\HelperModel;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

class EmployeeShow extends Component
{
    public $company_id;

    public function mount(){
        $this->company_id = auth()->user()->company_id;
    }

    public function createUser(string $id){
        $employee = Employee::find($id);
        $user = HelperModel::setData(User::class,[
            'name' => $employee->name,
            'username' => self::generateUserName($employee->name),
            'email' => $employee->email,
            'password' => '12345678910',
            'company_id' => $employee->company_id,
            'employee_id' => $employee->id,
            'isAdmin' => 0
        ]);
    }

    private static function generateUserName($name)
    {
        $name = iconv('UTF-8', 'ASCII//TRANSLIT', $name);
        $name =  preg_replace('/[^a-zA-Z0-9]/', '', strtolower(str_replace([' ', 'Dr.', 'Sr.', 'Srta.', 'Sra.'], '', $name)));
        return $name;
    }

    #[Layout('livewire.dashboard.layout')]
    public function render()
    {
        $employees = Employee::whereCompanyId($this->company_id)->orderBy('order','DESC')->paginate();
        return view('livewire.dashboard.employee.employee-show', ['employees' => $employees]);
    }
}
