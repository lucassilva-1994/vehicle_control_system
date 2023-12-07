<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';
    protected $fillable = ['id','order','name','cpf','email','address','company_id','job_title_id','created_at','updated_at'];
    public $timestamps = false;
    protected $keyType = 'string';
    public $incrementing = false;

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function jobTitle(){
        return $this->belongsTo(JobTitle::class,'job_title_id');
    }

    public function ContactEmployee(){
        return $this->hasMany(ContactEmployee::class);
    }

    public function employeeAddress(){
        return $this->hasOne(EmployeeAddress::class,'employee_id','id');
    }
}
