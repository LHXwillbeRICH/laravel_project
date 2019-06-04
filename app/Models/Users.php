<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Users extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['nickname','sex','open_id','union_id','img_url','created_at','updated_at'];
    /**
     * 根据union_id来获取用户信息
     * @param $union_id
     * @return mixed
     */
    public function getInfoByUnionId($union_id){
        return self::where(['union_id'=>$union_id])->first();
    }

    /**
     * 插入一条用户数据
     * @param $info
     */
    public function addUser($info){
        return self::insert($info);
    }

    /**
     * 根据id修改用户信息
     * @param $id
     * @param $info
     * @return mixed
     */
    public function changeUserInfoById($id,$info){
        return self::where(['id'=>$id])->update($info);
    }



    /**
     * 属性修改器 当真实姓名没有的时候显示微信昵称
     * @return mixed
     */
    public function getNameAttribute(){
        return $this->realname ? $this->realname : $this->nickname;
    }


}
