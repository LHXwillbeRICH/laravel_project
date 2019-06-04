<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    /**
     * 根据id查询设备名称
     * @param $id
     * @return mixed
     */
    public function getEquipmentById($id){
        return self::find($id);
    }

    /**获取所有的设备信息
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getEquipmentList(){
        return self::all();
    }
}
