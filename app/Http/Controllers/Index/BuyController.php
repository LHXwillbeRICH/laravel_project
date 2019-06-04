<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\WxBaseController;
use App\Models\Game;
use App\Models\Plat;
use App\Models\Store;
use App\Models\StoreTrade;
use App\SDK\ThinkOauth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\WX\ShareController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class BuyController extends Controller
{
    //
    public function index($type = 1){
        $info['type'] = $type;
        $G = new Game();
        $info['game_list'] = $G->getGameListByCondition(['game_type'=>$type]);
        return view('index.buy.index',$info);
    }

    /**
     * 根据游戏id获取所有的商品列表
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store_list($id,$type='0',$plat='0',$qufu='0',$sort='0',Request $request){

        $where=['g_id'=>$id];
        if(!empty($type)){
           $where['trade_id'] = $type;
        }
        if(!empty($plat)){
           $where['plat_id'] = $plat;
        }
        if(!empty($qufu)){
           $where['game_address'] = $qufu;
        }
        $order = ['id'=>'desc'];
        $G = new Game();
        $info['game_info'] = $G->getGameById($id);

        $P = new Plat();
        $info['plat_list'] = $P->getPlatList();

        $T = new StoreTrade();
        $info['trade_list'] = $T->getStoreTradeList();

        $S = new Store();
        $info['store_list'] =$S->getStoreByCondition($where,$order);
        $qinfo = [];
        foreach($info['store_list'] as $v){
            $qinfo[] = $v['game_address'];
        }
        $info['game_address'] = array_unique($qinfo);
        $info['type'] = $type;
        $info['plat'] = $plat;
        $info['qufu'] = $qufu;
        $info['sort'] = $sort;
        return view('index.buy.store_list',$info);
    }

    /**
     * 显示商品详情
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function detail($id){
        $S = new Store();
        $info = $this->getWxInfo();
        $info['store_info'] = $S->getStoreById($id);
        $info['url'] = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        return view('index.buy.detail',$info);
    }

    /**
     * 填写下单信息
     * @param $id
     */
    public function order($id){
        $S = new Store();
        $info['store_info'] = $S->getStoreById($id);
        $info['user'] = Auth::user();
        return view('index.buy.order',$info);
    }

    /**
     * 获取微信参数
     * @return mixed
     */
    public function getWxInfo(){
        $sdk = new ShareController();
        $sdk->getAccessToken('aa');  //aa为随便传的值。因为这个接口不需要调用别的参数借口，只用获取token
        $sdk->getJsapiTicket();
        $result = $sdk->getSign();
        $info['timestamp'] = $sdk->time;
        $info['appId'] = $sdk->AppKey;
        $info['nonceStr'] = $sdk->nonceStr;
        $info['signature'] = $result;
        return $info;
    }
}
