<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class HelperModel extends Model
{
    public static function setData($model, array $data){
        $data['id'] = self::setUUid();
        $data['order'] = self::setOrder($model);
        $data['created_at'] = now();
        if(isset($data['password'])){
            $data['password'] = bcrypt($data['password']);
        }
        return $model::create($data);
    }

    private static function setUUid(){
        return Uuid::uuid4();
    }

    private static function setOrder($model){
        $result = $model::latest('order')->first();
        return $result ? $result->order +=1 : 1;
    }
}
