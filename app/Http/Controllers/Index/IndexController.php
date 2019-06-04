<?php

namespace App\Http\Controllers\Index;

use App\Models\Banner;
use App\Models\Game;
use App\Models\Store;
use App\Models\StoreTrade;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{


    //
    const LIMIT=8; //显示游戏的条数
    const GAME_TYPE = 1;//手游类型
    const GAME_TYPE_H5 = 2;//H5类型
    const IS_HOT = 1;//是否热门  1 是
    public function index(){
        if(!is_weixin()){
            return view('index.public.wxchat');
        }

        //获取banner列表
        $b_model = new Banner();
        $b_list = $b_model->getBannerBySort();

        $g_model = new Game();
        $p_h_list = $g_model->getGameListByCondition(['game_type'=>self::GAME_TYPE,'is_hot'=>self::IS_HOT],self::LIMIT); //热门手游
        $c_h_list = $g_model->getGameListByCondition(['game_type'=>self::GAME_TYPE_H5,'is_hot'=>self::IS_HOT],self::LIMIT); //热门H5

        $store = new Store();
        $info['store_list'] = $store->getStoreList(self::LIMIT);

        $info['phone_h_list'] = $p_h_list;
        $info['comp_h_list'] = $c_h_list;
        $info['banner_list'] = $b_list;
        return view('index.index.index',$info);
    }


    /**
     * 搜索商品
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function gameSearch(Request $request){
        $info['game_list'] = [];
        if($request->method() == 'POST'){
            $game_name = $request->only('game_name')['game_name'].'%';
            $game = new Game();
            $game_list = $game->getGameListByCondition([['game_name','like',$game_name]],200);
            foreach($game_list as $v){
                $info['game_list'][$v['game_type']][] = $v;
            }
        };
        return view('index.index.gamesearch',$info);
    }
}
