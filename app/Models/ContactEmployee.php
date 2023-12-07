<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactEmployee extends Model
{
    protected $table = 'contact_employees';
    protected $fillable = ['id','order','name_contact','phone_number','employee_id','created_at','updated_at'];
    public $timestamps = false;
    protected $keyType = 'string';
    public $incrementing = false;
}
