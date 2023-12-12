<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    protected $fillable = ['id','order','name','created_at'];
    protected $keyType = 'string';
    public $timestamps = false;
}
