<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';
    protected $fillable = ['id','order','name','username','email','password','company_id','created_at','updated_at'];
    public $timestamps = false;
    protected $keyType = 'string';
    public $incremeting = false;

    public function company(){
        return $this->belongsTo(Company::class);
    }
}
