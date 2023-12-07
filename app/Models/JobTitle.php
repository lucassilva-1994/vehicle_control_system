<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class JobTitle extends Model
{
    protected $table = 'job_titles';
    protected $fillable = ['id','order','name','company_id','created_by','created_at','updated_at'];
    public $timestamps = false;
    protected $keyType = 'string';

    public function employees(){
        return $this->hasMany(Employee::class);
    }

    public function createdBy(){
        return $this->belongsTo(User::class,'created_by');
    }
}
