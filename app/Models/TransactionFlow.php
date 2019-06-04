<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionFlow extends Model
{
    /**
     * 根据uid获取流水列表
     * @param $u_id
     * @return mixed
     */
    public function getTransactionByUid($u_id){
        $where['u_id'] = $u_id;
        return self::where($where)->orderby('id','desc')->get();
    }

    /**
     * 添加体现流水
     * @param $info
     * @return mixed
     */
    public function addInfo($info){
        return self::insert($info);
    }
}
