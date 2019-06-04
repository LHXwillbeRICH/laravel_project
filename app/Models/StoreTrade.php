<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StoreTrade extends Model
{
    //
    public function getStoreTradeList(){
        return self::all();
    }

    /**
     * 根据id获取商品
     * @param $id
     * @return mixed
     */
    public function getTradeById($id){
        return self::find($id);
    }
}
