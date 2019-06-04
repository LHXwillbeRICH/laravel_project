<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    //
    protected $fillable = ['store_name','store_price','trade_id','store_content','store_sale','store_status','store_count',
        'g_id','game_address','game_account','game_password','game_role','equipment_id','plat_id','u_id','is_recommend','review','created_at','updated_at'];

    /**
     * 获取商品列表
     * @param $limit
     * @return mixed
     */
    public function getStoreList($limit,$status = 0){
        return self::orderby('id','desc')->where(['store_status'=>1])->offset(0)->limit($limit)->get();
    }
    /**
     * 根据id来查询商品
     * @param $id
     * @return mixed
     */
    public function getStoreById($id){
        return self::find($id);
    }
    /**
     * 根据条件查询商品列表
     * @param $condition
     * @param array $order
     * @return mixed
     */
    public function getStoreByCondition($condition,$order = ['id'=>'desc']){

        return self::select('stores.*','games.game_type')->join('games','stores.g_id','=','games.id')->where($condition)->where('stores.store_status','!=',3)->orderby('stores.'.key($order),array_shift($order))->get();
    }
    /**
     * 添加商品
     * @param $info
     */
    public function addStore($info){
       return self::create($info);
    }

    /**
     * 修改商品状态
     * @param $s_id
     * @param $status
     * @return mixed
     */
    public function changeStoreStatus($s_id,$status){
        $result =  self::find($s_id);
        $result->store_status = $status;
        return $result->save();
    }

    /**
     * 获取商品中对应的商品类型相关信息
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
   public function tradeInfo(){
        return $this->hasOne(StoreTrade::class,'id','trade_id');
   }

    /**
     * 获取游戏信息
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
   public function gameInfo(){
       return  $this->hasOne(Game::class,'id','g_id');
   }

    /**
     * 获取对应平台信息
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
   public function platInfo(){
       return $this->hasOne(Plat::class,'id','plat_id');
   }

    /**
     * 获取商品的拥有者信息
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
   public function userInfo(){
       return $this->hasOne(Users::class,'id','u_id');
   }

    /**
     * 获取商品对应设备名称
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
   public function equipmentInfo(){
       return $this->hasOne(Equipment::class,'id','equipment_id');
   }

   public function StoreImgInfo(){
       return $this->hasMany(StoreImg::class,'s_id','id');
   }


    /**
     * 商品的原价
     * @return float
     */
   public function getOldPriceAttribute(){
       return $this->store_price/100*10/$this->store_sale;
   }

    /**
     * 将商品的单位改为元后的价格
     * @return float|int
     */
   public function getRealPriceAttribute(){
       return $this->store_price/100;
   }
}
