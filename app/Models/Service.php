<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';
    protected $fillable = ['id','order','description','value','company_id','created_by','executed_by','vehicle_id','created_at','updated_at'];
    public $timestamps = false;
    protected $keyType = 'string';
    

    public function vehicle(){
        return $this->hasOne(Vehicle::class,'id','vehicle_id');
    }

    public function user(){
        return $this->hasOne(User::class,'id','created_by');
    }

    public function employee(){
        return $this->hasOne(Employee::class,'id','executed_by');
    }
}
