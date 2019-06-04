<?php

namespace App\Admin\Controllers;

use App\Models\ActionLog;
use App\Models\Orders;
use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Support\Collection;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class OrderController extends Controller
{
    use HasResourceActions;
    const STORE_STATUS = 2;// 商品交易状态 交易中
    const STORE_UNSELL = 1;// 商品交易状态  待出售
    const ORDER_STATUS = 3;//订单状态  待确认收货

    public $order_status = [
        1 =>'未支付',
        2 =>'待发货',
        3=>'待确认收货',
        4=> '交易成功',
        9=>'已删除'
    ];
    public $a;
    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('Index')
            ->description('description')
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header('Detail')
            ->description('description')
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('Edit')
            ->description('description')
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('Create')
            ->description('description')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $store = new Store();
        $grid = new Grid(new Orders);
        $grid->model()->orderby('id','desc');
        $grid->id('Id');
        $grid->s_id('商品id');
        $grid->price('价格(元)')->display(function(){
            return $this->price/100;
        });
        $grid->order_code('订单编号')->expand(function($model) use ($store){
            $info = $store->getStoreById($model->s_id);
            $result = json_decode(json_encode($info),true);
            unset($result['store_content']);
            unset($result['store_sale']);
            unset($result['equipment_id']);
            unset($result['is_recommend']);
            unset($result['review']);
            return new \Encore\Admin\Widgets\Table(['商品id','商品名称','商品价格 单位分','商品类型 ','商品状态','商品编号','商品数量','游戏id','游戏区服','游戏账号','游戏密码','游戏角色名称','平台id','用户id'],[$result]);
        });
        $grid->status('状态')->select($this->order_status);
        $grid->column('is_send','发货')->switch([
            'off'  => ['value' => 0, 'text' => '发货', 'color' => 'primary'],
            'on' => ['value' => 1, 'text' => '发货', 'color' => 'default'],
        ]);

        $grid->phone('手机号');
        $grid->qq('QQ');
        $grid->order_des('订单描述')->display(function(){
            return mb_substr($this->order_des,0,20);
        });
        $grid->u_id('购买者id');
        $grid->created_at('创建时间');

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Orders::findOrFail($id));

        $show->id('Id');
        $show->s_id('商品id');
        $show->price('价格(元)')->as(function($price){
            return $price/100;
        });
        $show->order_code('订单编号');
        $show->status('订单状态')->using($this->order_status);
        $show->phone('手机号');
        $show->qq('qq');
        $show->order_des('订单描述');
        $show->u_id('购买者id');
        $show->created_at('创建时间');
        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Orders);
        $form->number('s_id', '商品id');
        $form->number('price', '价格（分）');
        $form->text('order_code', '订单编号');
        $form->select('status', '订单状态')->options($this->order_status);
        $form->mobile('phone', '手机号');
        $form->text('qq', 'qq');
        $form->editor('order_des', '订单描述');
        $form->number('u_id', '用户id');

        return $form;
    }

    public function update($id){
        $info = request()->all();
        if(request()->has('is_send') ){
            try{
                $order = new Orders();
                $order_info = $order->getOrderById($id);
                $store = new Store();
                $store->changeStoreStatus($order_info->s_id,self::STORE_STATUS);
                $info['status'] = (string)self::ORDER_STATUS;
            }catch(\Exception $e){
                $action_log = new ActionLog();
                $action_log->addInfo(['action'=>'admin_store_status','msg'=>'修改订单状态时候修改商品属性失败'.$e->getMessage()]);
                return admin_toastr('发货修改商品属性失败'.$e->getMessage(), 'error');
            }
        }elseif(in_array($info['status'],[1,2]) ){

            try{
                $order = new Orders();
                $order_info = $order->getOrderById($id);
                $store = new Store();
                $store->changeStoreStatus($order_info->s_id,self::STORE_UNSELL);
            }catch(\Exception $e){
                $action_log = new ActionLog();
                $action_log->addInfo(['action'=>'admin_store_status','msg'=>'修改订单状态时候修改商品属性失败'.$e->getMessage()]);
                return admin_toastr('修改商品属性未支付或代发货失败'.$e->getMessage(), 'error');
            }
        }elseif (in_array($info['status'],[3,4]) ){
            try{
                $order = new Orders();
                $order_info = $order->getOrderById($id);
                $store = new Store();
                $store->changeStoreStatus($order_info->s_id,self::STORE_STATUS);
            }catch(\Exception $e){
                $action_log = new ActionLog();
                $action_log->addInfo(['action'=>'admin_store_status','msg'=>'修改订单状态时候修改商品属性失败'.$e->getMessage()]);
                return admin_toastr('修改商品属性交易成功失败'.$e->getMessage(), 'error');
            }
        }
        return $this->form()->update($id,$info);
    }
}
