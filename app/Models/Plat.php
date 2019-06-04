<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plat extends Model
{
    /**
     * 根据id获取平台信息
     * @param $id
     * @return mixed
     */
    public function getInfoById($id){
        return self::find($id);
    }

    /**
     * 获取平台列表
     */
    public function getPlatList(){
        return self::all();
    }
}
