<?php

namespace App\Http\Controllers\index;
use App\Models\AccountBalance;
use App\Models\PayLog;
use App\Models\TransactionFlow;
use Illuminate\Support\Facades\DB;
use Think\Exception;
use Yansongda\Pay\Pay;
use App\Models\Orders;
use App\Models\Store;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PayController extends Controller
{
    //
    const STATUS = 2;//订单状态 代发货
    CONST SUCCESS = 1; //支付状态  成功
    CONST FAIL = 2;//支付状态 失败
    CONST UNSEND = 2; //交易中


    public function index($id,$order_id = 0,Request $request){
        $info = $request->except('_token');
        $S = new Store();
        $store_info = $S->getStoreById($id);
        $O = new Orders();
        if($order_id){
            $result = $O->getOrderById($order_id);
            $order_code = $result->order_code;
        }else{

            $order_code = $info['order_code'] ??  $this->getOrderCode($store_info->id); //获取订单编号
            $order_info = [
                's_id'  =>$store_info->id,
                'price' =>$store_info->store_price,
                'phone' =>$info['mobile'],
                'qq'    =>$info['qq'],
                'u_id'  =>Auth::id() ?? 3,
                'order_code'=>$order_code,
                'order_des' =>$info['des'] ?? '',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ];
            $result = $O->addOrder($order_info);
        }

        $config_info = [
            'out_trade_no' => $order_code,  // 商户订单流水号，与支付宝 out_trade_no 一样
            'total_fee' => $store_info->store_price, // 与支付宝不同，微信支付的金额单位是分。
            'body'      => '订单'.$order_code.'支付金额', // 订单描述
            'spbill_create_ip'=>$_SERVER['REMOTE_ADDR'],  //支付人的 IP
            'openid'        =>Auth::user()->open_id,
        ];
        $info['price'] = $store_info->store_price/100;
        $config = config('pay.wechat');
        $config['attach'] = Auth::id();
        $return = Pay::wechat($config)->mp($config_info);
        $info['info'] = json_decode($return,true);
        return view('index.pay.index',$info);
    }

    /**
     * 微信回调地址
     * @return string
     */
    public function wechatNotify()
    {
        // 校验回调参数是否正确
        $config = config('pay.wechat');
        $config['attach'] = Auth::id();
        $data  =  $pay = Pay::wechat($config)->verify();
        $pay_info = [
            'u_id'  =>$data->attach,
            'pay_type'=>$data->trade_type,
            'created_at'=>date('Y-m-d H:i:s')
        ];
        $order = new Orders();
        $pay_log = new PayLog();
        DB::beginTransaction();
        try{
            if($data->return_code == 'SUCCESS'){
                $order->changeOrderByOrderCode($data->out_trade_no,['status'=>self::STATUS]);
                $result = $order->getOrderByCondition(['order_code'=>$data->out_trade_no]);
                $u_id = $result[0]->storeInfo->u_id;
                $account = new AccountBalance();
                $account->editAccountBalance($u_id,$data->total_fee,'ADDFA');   //为买家账户添加冻结金额

                //修改商品状态为待发货
                $s_id = $result[0]->storeInfo->id;
                $store = new Store();
                $store->changeStoreStatus($s_id,self::UNSEND);

                $pay_info['status'] = self::SUCCESS;
                $pay_info['msg'] = $data->transaction_id;
            }else{
                $pay_info['status'] = self::FAIL;
                $pay_info['msg'] = $data->return_msg;
            }
            DB::commit();
            $pay_log ->addInfo($pay_info);   //添加支付日志
            return app('wechat_pay')->success();
        }catch (\Exception $e){
            DB::rollback();
            $pay_info['status'] = self::FAIL;
            $pay_info['msg'] = '更新数据异常,根据订单号查看支付日志和订单状态，还有用户冻结金额'.$e->get.$data->return_msg;
            $pay_log ->addInfo($pay_info);   //添加支付日志
            return "<xml><return_code><![CDATA[FAIL]]></return_code><return_msg><![CDATA[error]]></return_msg></xml>";;
        }


    }
    /**
     * 获取订单编号
     * @param $s_id
     * @return string
     */
    public function getOrderCode($s_id){
        $str = '00000000'.$s_id;
        return str_replace('.','',microtime('get_as_float')).substr($str,-1,6);
    }
}
