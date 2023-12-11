<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';
    protected $fillable = [
        'id','order','trade_name','legal_name','cnpj',
        'state_registration','contact_phone','contact_email','mobile_phone',
        'created_at','updated_at'
    ];
    public $timestamps = false;
    public $keyType = 'string';
    public $incrementing = false;

    public function jobTitles(){
        return $this->hasMany(JobTitle::class);
    }

    public function users(){
        return $this->hasMany(User::class);
    }

    public function address(){
        return $this->hasOne(Address::class);
    }

    public function vehicles(){
        return $this->hasMany(Vehicle::class);
    }

    public function employees(){
        return $this->hasMany(Employee::class);
    }

    public function services(){
        return $this->hasMany(Service::class);
    }
}
