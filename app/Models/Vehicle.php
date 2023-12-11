<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $table = 'vehicles';
    protected $fillable = ['id','order','brand','renavan','model','type','year','color','plate','created_by','company_id','created_at','updated_at'];
    public $timestamps = false;
    protected $keyType = 'string';
    public $incrementing = false;

    public function user(){
        return $this->belongsTo(User::class,'created_by','id');
    }

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function services(){
        return $this->hasMany(Service::class);
    }
}
