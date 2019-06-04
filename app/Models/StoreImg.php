<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StoreImg extends Model
{
    public function getStoreImgListBySid($s_id){
        return self::where(['s_id'=>$s_id])->orderby('id','desc')->get();
    }
    /**
     * 添加图片
     * @param $info
     * @return mixed
     */
    public function addInfo($info){
        return self::insert($info);
    }
}
