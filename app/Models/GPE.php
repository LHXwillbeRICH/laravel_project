<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class GPE extends Model
{
    protected $table='game_plat_equipment';
    //
    protected $fillable=['g_id','e_id','p_id','created_at','updated_at'];
    /**
     * 根据条件 删除记录
     * @param array $condition
     * @return mixed
     */
    public function deleteGPEInfo($condition){
        return self::where($condition)->delete();
    }

    /**
     * 批量插入信息
     * @param $info
     * @return mixed
     */
    public function addGPEInfo($info){
       return self::insert($info);
    }

    /**
     * 根据游戏id获取所有的信息
     * @param $g_id
     */
    public function getAllInfoByGid($g_id){
       return DB::table('game_plat_equipment as gpe')->select('e_name','plat_name','e_id','p_id')->join('equipment as e','e.id', '=', 'gpe.e_id')->join('plats as p','p.id' ,'=', 'gpe.p_id')->where('g_id',$g_id)->orderby('gpe.e_id')->get();
    }
    /**
     * 根据条件获取所有的信息
     * @param $g_id
     */
    public function getAllInfoByConditon($where){
       return DB::table('game_plat_equipment as gpe')->select('e_name','plat_name','e_id','p_id')->join('equipment as e','e.id', '=', 'gpe.e_id')->join('plats as p','p.id' ,'=', 'gpe.p_id')->where($where)->orderby('gpe.e_id')->get();
    }
}
