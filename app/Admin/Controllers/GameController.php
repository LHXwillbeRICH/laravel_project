<?php

namespace App\Admin\Controllers;

use App\Models\Equipment;
use App\Models\Game;
use App\Models\GPE;
use App\Models\Plat;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Think\Exception;
use Encore\Admin\Widgets\Table;

class GameController extends Controller
{
    use HasResourceActions;

    const HOT = 1;
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

        $GPE = new GPE();
        $grid = new Grid(new Game);
        $grid->model()->orderby('id','desc');
        $grid->disableExport();
        $grid->actions(function($actions){
            $actions->append("<a href='/game/allocation/{$actions->getKey()}/{$actions->row["game_name"]}' <i class='fa fa-paper-plane'></i></a>");
        });
        $grid->filter(function($filter){
            $filter->like('game_name','游戏名称');
            $filter->between('created_at', '创建时间')->datetime();
            $filter->like('game_type','游戏类型')->select([
                1 => '手游',
                2 => 'H5',
            ]);
            $filter->like('is_hot','是否热门')->select([
                1 => '是',
                2 => '否',
            ]);
        });
        $grid->id('ID');
        $grid->game_name('游戏名称')->expand(function($model) use($GPE){
            $info =json_decode(json_encode($GPE->getAllInfoByGid($model->id)),true);
            return new Table(['设备名称', '平台名称'],$info);
        });
        $grid->game_type('游戏类型')->using([1=>'手游',2=>'H5']);
        $grid->is_hot('是否热门')->display(function($is_host){
            return $is_host == self::HOT ? '是' : '否';
        });
        $grid->game_details('游戏描述')->display(function($game_details){
            return mb_substr($game_details,0,25);
        });
        $grid->game_logo('游戏logo')->image('',50,50);
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
        $show = new Show(Game::findOrFail($id));

        $show->id('Id');
        $show->game_name('游戏名称');
        $show->game_type('游戏类型')->using([1=>'手游',2=>'H5']);
        $show->is_hot('是否热门')->using([1=>'是',2=>'否']);
        $show->game_details('游戏描述');
        $show->game_logo('游戏logo')->image();
        $show->game_initial('游戏首字母');
        $show->created_at('创建时间');
        $show->updated_at('更新时间');

        return $show;
    }

    /**
     * 新增游戏view页面
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Game);

        $form->footer(function ($footer) {
            // 去掉`查看`checkbox
            $footer->disableViewCheck();
            // 去掉`继续编辑`checkbox
            $footer->disableEditingCheck();
            // 去掉`继续创建`checkbox
            //$footer->disableCreatingCheck();
        });

        $form->text('game_name', '游戏名称');
        $form->text('download','下载地址');
        $form->radio('game_type','游戏类型')->options(array(1=>'手游',2=>'H5'));
        $form->radio('is_hot', '是否热门')->options(array(1=>'是',2=>'否'));
        $form->editor('game_details', '游戏描述');
        $form->image('game_logo', '游戏logo')->move('images/game');
        $form->select('game_initial', '游戏首字母')->options($this->initial());

        return $form;
    }

    /**
     * 给游戏添加设备平台
     * @param $id  游戏id
     * @param $game_name  游戏名称
     * @param Content $content
     * @return Content
     */
    public function allocation($id,$game_name,Content $content){
        return $content
            ->header('Create')
            ->description('description')
            ->body($this->allocationContent($id,$game_name));
    }

    /**
     * 修改游戏设备平台view
     * @param $id  游戏id
     * @param string $game_name  游戏名称
     * @return Form
     */
    public function allocationContent($id,$game_name=''){
        $eModel = new Equipment();
        $e_list = $eModel->getEquipmentList();   //获取所有设备的名称
        foreach($e_list as $v){
            $oe_list[$v['id']] = $v['e_name'];
        }

        $pModel = new Plat();
        $plist = $pModel->getPlatList();
        foreach($plist as $v){
            $ol_list[$v['id']] = $v['plat_name'];
        }
        $peform = new Form(new GPE());
        $peform->footer(function ($footer) {
            // 去掉`查看`checkbox
            $footer->disableViewCheck();
            // 去掉`继续编辑`checkbox
            $footer->disableEditingCheck();
            // 去掉`继续创建`checkbox
            $footer->disableCreatingCheck();
        });

        $peform->html($game_name, $label = '游戏名称');
        $peform->radio('e_id','设备名称')->options($oe_list);
        $peform->checkbox('p_id','平台名称')->options($ol_list);
        $peform->html("<input type='hidden' value='$id' name='g_id'>", $label = '');
        $peform->setAction('/game/edit_allocations');
        //$peform->store();
        return $peform;
    }

    /**
     * 修改游戏设备平台操作
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|void
     */
    public function editAllocation(Request $request){
        $g_id = $request->input('g_id');
        $e_id = $request->input('e_id');
        $p_ids = $request->input('p_id');
        array_pop($p_ids);
        $gpe = new GPE();
        $condition = ['g_id'=>$g_id,'e_id'=>$e_id];
        DB::beginTransaction();
        try{
            $gpe->deleteGPEInfo($condition);
                foreach ($p_ids as $key=>$value){
                    $info[] = ['e_id'=>$e_id,'g_id'=>$g_id,'p_id'=>$value];
                }
            $gpe->addGPEInfo($info);
            DB::commit();
        }catch (Exception $exception){
            admin_toastr('修改失败', 'fail', ['timeOut' => 5000]);
            DB::rollback();
        }


        admin_toastr('修改成功', 'success', ['timeOut' => 5000]);
        return redirect('/game');
    }
    /**
     * 游戏首字母
     * @return array
     */
    public function initial(){
        return ['A'=>'A','B'=>'B','C'=>'C','D'=>'D','E'=>'E','F'=>'F','G'=>'G','H'=>'H','I'=>'I','J'=>'J','K'=>'K','L'=>'L','M'=>'M','N'=>'N','O'=>'O','P'=>'P','Q'=>'Q','R'=>'R','S'=>'S','T'=>'T','U'=>'U','V'=>'V','W'=>'W','X'=>'X','Y'=>'Y','Z'=>'Z'];
    }
}
