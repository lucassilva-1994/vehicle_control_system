<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeAddress extends Model
{
    protected $table = 'employee_addresses';
    protected $fillable = ['id','order','postcode','street','neighborhood','number','complement','city','state','employee_id','created_at','updated_at'];
    public $timestamps = false;
    protected $keyType = 'string';
    public $incrementing = false;
}
