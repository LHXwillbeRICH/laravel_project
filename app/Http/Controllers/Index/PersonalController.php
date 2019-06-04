<?php

namespace App\Http\Controllers\Index;

use App\Models\AccountBalance;
use App\Models\Store;
use App\Models\TransactionFlow;
use App\Models\Users;
use Common\Model\AccountBalanceModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PersonalController extends Controller
{
    //
    //
    public function index(){
        $info['user'] = Auth::user();
        return view('index.personal.index',$info);
    }

    /**
     * 用户详细资料
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function data(){
        $info['user'] = Auth::user();
        return view('index.personal.data',$info);
    }

    /**
     * 修改用户信息
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function dataEdit(Request $request){
        $request = $request->except(['_token','s','submit']);
        $info['user'] = Auth::user();
        $uModel = new Users();
        $uModel->changeUserInfoById($info['user']['id'],$request);

        return view('index.personal.index',$info);
    }

    /**
     * 我的商品列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function storeList($type=1){
        $sModel = new Store();
        $info['type'] = $type;
        $info['store_list'] = $sModel->getStoreByCondition(['u_id'=>Auth::id(),'games.game_type'=>$type],['id'=>'desc']);
        return view('index.personal.store_list',$info);
    }

    /**
     * 体现
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function tixian(){
        $u_id = Auth::id();
        $account = new AccountBalance();
        $info['account_info'] =  $account->getAccountBalanceByUserId($u_id);
        $tran = new TransactionFlow();
        $info['tran_info'] = $tran->getTransactionByUid($u_id);
        return view('index.personal.tixian',$info);
    }

    public function withdraw($money,Request $request){
        $money = (int)$money;
        $u_id = Auth::id();
        $account = new AccountBalance();
        $tran = new TransactionFlow();
        DB::beginTransaction();
        try{
            $account -> editAccountBalance($u_id,$money*100,'DECAT');
            $account -> editAccountBalance($u_id,$money*100,'ADDFA');

            $tran->addInfo(['u_id'=>$u_id,'money'=>$money*100,'created_at'=>date('Y-m-d H:i:s')]);

            DB::commit();
            return response()->json(['code'=>1,'msg'=>'体现成功，请等待客服确认']);

        }catch (\Exception $e){
            DB::rollback();
            return response()->json(['code'=>2,'msg'=>'体现失败,请联系客服处理']);
        }
    }
    /**
     * 显示修改手机号界面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function changePhone(){
        $info['user'] = Auth::user();
        return view('index.personal.change_phone',$info);
    }

    /**
     *显示修改手机号界面
     */
    public function changePhoneReset(){
        $info['user'] = Auth::user();
        return view('index.personal.change_phone_reset',$info);
    }

    public function smsCode(Request $request){
        $info = [];
        $phone = $request->input('phone');

        var_dump($phone);exit;
        return response()->json($info);
    }
}
