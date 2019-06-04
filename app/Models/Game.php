<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    //
    public function getGameList($limit=100){
       return self::offset(0)->limit($limit)->orderby('id','desc')->get();
    }

    /**
     * 根据条件显示游戏列表
     * @param $type
     * @param $limit
     */
    public function getGameListByCondition($condition,$limit=10){
        return self::where($condition)->offset(0)->limit($limit)->orderby('id','desc')->get();
    }

    /**
     * 根据游戏id查询信息
     * @param $id 游戏id
     */
    public function getGameById($id){
        return self::find($id);
    }

    /**
     * 根据游戏id显示所有的商品列表
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function getStoreInfoByGameId(){
        return $this->hasMany(Store::class,'g_id','id');
    }
}
