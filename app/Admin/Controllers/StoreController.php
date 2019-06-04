<?php

namespace App\Admin\Controllers;

use App\Models\Equipment;
use App\Models\Game;
use App\Models\Plat;
use App\Models\Store;
use App\Http\Controllers\Controller;
use App\Models\StoreTrade;
use Encore\Admin\Admin;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class StoreController extends Controller
{
    use HasResourceActions;

    protected $trade=[1=>'游戏账号',2=>'首充号',3=>'其他'];

    protected $store_status = [1=>'待出售' ,2=>'交易中', 3=>'已下架'];

    protected $review = [1=>'通过', 2=>'未通过' ,0=>'待审核'];

    protected $is_recomd = [1=>'是',2=>'否'];
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

        $grid = new Grid(new Store);
        $grid->model()->orderby('id','desc');
        $grid->filter(function($filter){
            $filter->like('store_name','商品名称');
            $filter->like('game_role','角色名称');
            $filter->equal('trade_id','商品类型')->select($this->getTradeInfo());
            $filter->equal('plat_id','平台名称')->select($this->getPlatInfo());
            $filter->between('created_at', '创建时间')->datetime();
        });
        $grid->disableExport();
        $grid->store_name('商品名称');
        $grid->store_price('商品价格（元）')->display(function($info){
            return $info/100;
        });
        $grid->tradeInfo()->trade_name('商品类型');
        $grid->store_content('商品描述')->display(function($content){
            return mb_substr($content,0,10);
        });
        $grid->store_sale('折扣');
        $grid->store_status('商品状态')->using($this->store_status);
        $grid->store_count('商品数量');
        $grid->gameInfo()->game_name('游戏名称');
        $grid->game_address('游戏区服');
        $grid->game_account('游戏账号');
        $grid->game_password('密码');
        $grid->game_role('角色');
        $grid->equipment_id('设备');
        $grid->platInfo()->plat_name('平台名称');
        $grid->u_id('用户');
        $states = [
            'on'  => ['value' => 1, 'text' => '是', 'color' => 'primary'],
            'off' => ['value' => 0, 'text' => '否', 'color' => 'default'],
        ];
        $grid->is_recommend('是否推荐')->switch($states);
        $grid->review('审核状态')->editable('select',$this->review);
        $grid->created_at('添加时间');
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
        $store_status = $this->store_status;
        $show = new Show(Store::findOrFail($id));

        $show->id('Id');
        $show->store_name('商品名称');
        $show->store_price('商品价格');
        $show->trade_id('商品类型')->as(function($content){
            $t = new StoreTrade();
            $result = $t->getTradeById($content);
            return $result['trade_name'];
        });
        $show->store_content('商品描述');
        $show->store_sale('折扣');
        $show->store_status('商品状态')->as(function($status) use($store_status){
            return $store_status[$status];
        });
        $show->store_count('商品数量');
        $show->g_id('游戏名称')->as(function($g_id){
            $g = new Game();
            $result =$g->getGameById($g_id);
            return $result['game_name'];
        });
        $show->game_address('游戏区服');
        $show->game_account('游戏账号');
        $show->game_password('游戏密码');
        $show->game_role('游戏角色名称');
        $show->equipment_id('设备名称')->as(function($e_id){
            $e = new Equipment();
            $result = $e->getEquipmentById($e_id);
            return $result['e_name'];
        });
        $show->plat_id('平台名称')->as(function($p_id){
            $p = new Plat();
            $result = $p->getInfoById($p_id);
            return $result['plat_name'];
        });
        $show->u_id('用户名称');
        $show->is_recommend('是否推荐')->using($this->is_recomd);
        $show->review('审核状态')->using($this->review);
        $show->created_at('创建时间');
        $show->updated_at('修改时间');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Store);

        $form->text('store_name', '商品名称');
        $form->decimal('store_price', '商品价格');
        $form->select('trade_id', '商品类型')->options($this->getTradeInfo());
        $form->editor('store_content', '简介');
        $form->number('store_sale', '折扣信息');
        $form->select('store_status', '状态')->options($this->store_status);
        $form->number('store_count', '商品数量')->default(1);
        $form->text('gameInfo.game_name', '游戏名称');
        $form->text('game_address', '游戏区服');
        $form->text('game_account', '游戏账号');
        $form->text('game_password', '密码');
        $form->text('game_role', '角色名');
        $form->select('equipment_id', '游戏设备')->options($this->getEquipmentInfo());
        $form->select('plat_id', '平台名称')->options($this->getPlatInfo());
        if($_SERVER['REQUEST_URI'] == '/store/list/create'){
            $form->select('u_id','卖家姓名')->options();
        }else{
            $form->text('u_id', '买家姓名');
        }
        $form->switch('is_recommend', '是否推荐')->default(0);
        $form->select('review', '审核状态')->options($this->review)->default(0);

        return $form;
    }

    /**
     * 获取平台信息
     * @return mixed
     */
    public function getPlatInfo(){
        $P = new Plat();
        $result = $P->getPlatList();
        foreach($result as $k=>$v){
            $info[$v['id']] = $v['plat_name'];
        }
        return $info;
    }

    public function getTradeInfo(){
        $T = new StoreTrade();
        $result = $T->getStoreTradeList();
        foreach($result as $k=>$v){
            $info[$v['id']] = $v['trade_name'];
        }
        return $info;
    }

    public function getEquipmentInfo(){
        $T = new Equipment();
        $result = $T->getEquipmentList();
        foreach($result as $k=>$v){
            $info[$v['id']] = $v['e_name'];
        }
        return $info;
    }

}
