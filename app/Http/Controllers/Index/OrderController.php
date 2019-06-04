<?php

namespace App\Http\Controllers\Index;

use App\Models\Orders;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * 显示订单列表
     * @param $status
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function list($status,$position = 0){
        $info['status'] = $status;
        $where = ['u_id'=>Auth::id()];
        if(!empty($status)){
            $where['status'] = $status;
        }
        $O = new Orders();
        $info['order_list'] = $O->getOrderByCondition($where);
        if($position != 0){
            return $info;
        }
        return view('index.personal.list',$info);
    }

    /**
     * 修改订单状态
     * @param $status
     * @param $id
     * @param int $del
     */
    public function changeOrderStatus($status,$id,$del = 0){
        switch ($del){
            case 0:
                $change_status = 4;
                break;
            case 1:
                $change_status = 9;
                break;
        }
        $order = new Orders();
        $order->changeOrderById($id,['status'=>$change_status]);
        $info  = $this->list($status,1);
        return view('index.personal.list',$info);
    }
}
