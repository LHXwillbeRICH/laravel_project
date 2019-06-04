<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PayLog extends Model
{
    //
    /**
     * 插入支付日志
     * @param $info
     * @return mixed
     */
    public function addInfo($info){
        return self::insert($info);
    }
}
