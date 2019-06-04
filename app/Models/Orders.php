<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    //
    public function addOrder($info){
        return self::insert($info);
    }

    /**
     * 根据id获取订单信息
     * @param $id
     */
    public function getOrderById($id){
       return self::find($id);
    }


    /**
     * 根据条件显示订单列表
     * @param $where
     */
    public function getOrderByCondition($where){
       return  self::where($where)->where('status','!=',9)->orderBy('id','desc')->get();
    }

    /**
     * 订单对应的商品信息
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function storeInfo(){
        return $this->hasOne(Store::class,'id','s_id');
    }

    /**
     * 根据id修改订单条件
     * @param $id
     * @param $status
     * @return mixed
     */
    public function changeOrderById($id,$where){
        $info = self::find($id);
        $key = key($where);
        $info->$key = array_shift($where);
        return $info->save();
    }

    /**
     * 根据订单号修改订单
     * @param $code
     * @param $condition
     * @return mixed
     */
    public function changeOrderByOrderCode($code,$condition){
        $info = self::where(['order_code'=>$code])->first();
        $key = key($condition);
        $info->$key = array_shift($condition);
        return $info->save();
    }

}
