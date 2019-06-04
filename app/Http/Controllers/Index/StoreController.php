<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\WX\ShareController;
use App\Models\Equipment;
use App\Models\Game;
use App\Models\GPE;
use App\Models\Plat;
use App\Models\Store;
use App\Models\StoreImage;
use App\Models\StoreImg;
use App\Models\StoreTrade;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    //
    const TYPE = 2;

    protected  $url = 'https://api.weixin.qq.com/cgi-bin/media/get';


    public function index($type = 1){
        $g_model = new Game();
        $glist = $g_model->getGameListByCondition(['game_type'=>$type]);
        $info['game_list'] = $glist;
        $info['type'] = $type;
        return view('index.store.index',$info);
    }

    /**
     * 我要卖第一步
     * @param $id 游戏id
     */
    public function sellStepOne($id,Request $request){
        $type = $request->input('type',self::TYPE);  //根据类型显示平台的东西
        $gmodel = new Game();
        $info['game_info'] = $gmodel->getGameById($id);

        $tmodel = new StoreTrade();
        $info['trade_info'] = $tmodel->getStoreTradeList();
        $gpemodel = new GPE();
        $gpe = $gpemodel->getAllInfoByGid($id);
        $gpe = json_decode(json_encode($gpe),true);
        foreach ($gpe as $item) {
            $pinfo[$item['e_id']][] = $item;
        }

        //拼写设备数组
        $e_name = array_column($gpe,'e_name');
        $e_id = array_column($gpe,'e_id');
        $e_info = array_combine($e_id,$e_name);
        $einfo = [];
        foreach($e_info as $k=>$v){
            $einfo[] = ['e_id'=>$k,'e_name'=>$v];
        }

        $info['einfo'] = $einfo;   //设备信息
        $info['pinfo'] = isset($pinfo[$type]) ? $pinfo[$type] : [];  //平台信息
        $info['type'] = $type;
       return view('index.store.sell_step_one',$info);
    }

    /*
     * 根据设备来显示平台类型
     */
    public function ajax($id,$type){
        $gpemodel = new GPE();
        $gpe = $gpemodel->getAllInfoByGid($id);
        $gpe = json_decode(json_encode($gpe),true);
        foreach ($gpe as $item) {
            $pinfo[$item['e_id']][] = $item;
        }
        return response()->json($pinfo[$type]);
    }

    public function sellStepTwo(Request $request){
        $this->validate($request,[
            'qufu_name'=>'bail|required|string'
        ],[
            'qufu_name.required'=>'区服不能为空',
            'qufu_name.string' =>'区服必须为字符串'
        ]);
        $info = $request->except('_token');
        $G = new Game();
        $info['game_info'] = $G->getGameById($info['g_id']);  //游戏信息
        $ST = new StoreTrade();
        $info['st'] = $ST->getTradeById($info['trade_id']);  //游戏设备名称
        $P = new Plat();
        $info['plat_info'] = $P->getInfoById($info['plat_id']);  //游戏平台信息
        $E = new Equipment();
        $info['equip_info'] = $E->getEquipmentById($info['e_id']);  //游戏设备信息
        $info['u_id'] = Auth::id(); //用户id
        $BuyController = new BuyController();
        $info['wx'] = $BuyController->getWxInfo();
        return view('index.store.sell_step_two',$info);
    }

    /**
     * 添加商品
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function SellStepAdd(Request $request){
        file_put_contents('aa.txt','  a',FILE_APPEND);
        $this->validate($request,[
            'store_name'=>'required|string',
            'store_sale'=>'required|integer',
            'store_price'=>'required',
            'game_account'=>'required',
            'game_password'=>'required',
            'game_role'=>'required',
            'game_address'=>'required',
        ]);
        $info = $request->except('_token','s');
        $info['store_code']  = $this->getStoreCode(); //商品编号
        $info['store_price'] = $info['store_price']*100;//将商品价格改为分为单位
        $S = new Store();
        $storeImge = new StoreImg();
        $store_id = $S->addStore($info);  //添加商品
        $token = $this->getToken();    //获取token  网页授权的token 通过jssdk来上传的
        $path = $this->setImgPath();  //获取图片存路径

        foreach ($info['img'] as $v){
            $file = http_curl($this->url,['access_token'=>$token,'media_id'=>$v]);
            $uniName =Auth::id().'_'.time().rand(1000,9000).'.jpg';
            $images = ['s_id'=>$store_id['id'],'img_url'=>"{$path}{$uniName}"];
            $storeImge->addInfo($images);
            file_put_contents($path.$uniName,$file);
        }
        return view('index.public.success',['msg'=>'添加成功','url'=>'/']);
    }


    /**
     * 获取token
     * @return mixed
     */
    public function getToken(){
        $sdk = new ShareController();
        $sdk->getAccessToken('aa');
        return $sdk->Token['access_token'];
    }
    /**
     * 生成商品编号
     * @return mixed
     */
    public function getStoreCode(){
        return strrev(microtime(true));
    }

    /**
     * 修改商品状态
     * @param $status
     */
    public function changeStoreStatus($id,$status){
        $result = app('Store')->changeStoreStatus($id,$status);
        if($result){
            $result = ['code'=>1,'msg'=>'删除成功'];
        }else{
            $result = ['code'=>0,'msg'=>'删除失败'];
        }
        return \response()->json($result);
    }

    /**
     * 创建保存图片路径
     */
    public function setImgPath(){
        //图片存放的路径
        $data_time =date('Y-m-d',time());
        $path ="storage/images/store/".$data_time.'/';

        if(!file_exists($path)){
            mkdir($path,0777,true); //创建目录
            chmod($path,0777); //赋予权限
        }
        return $path;
    }
}