<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';
    protected $fillable = ['id','order','name','username','email','password','employee_id','company_id','created_at','updated_at'];
    public $timestamps = false;
    protected $keyType = 'string';
    public $incremeting = false;

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function employee(){
        return $this->belongsTo(Employee::class,'employee_id','id');
    }

    public function roles(){
        return $this->belongsToMany(Role::class);
    }
}
