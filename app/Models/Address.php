<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'addresses';
    protected $fillable = ['id','order','address','city','post_code','company_id','created_at','updated_at'];
    public $timestamps = false;
}
