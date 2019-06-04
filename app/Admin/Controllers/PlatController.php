<?php

namespace App\Admin\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Plat;
use Encore\Admin\Layout\Content;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Http\Request;

class PlatController extends Controller
{
    use HasResourceActions;

    protected $plat;
    protected $grid;
    protected $show;

    public function __construct() {
        $this->plat = new Plat();
    }

    //平台首页
    public function index(Request $request,Content $content){
        return $content
            ->header('平台列表')
            ->body($this->grid());
    }

    /**
     * 新增平台
     * @param Request $request
     * @param Content $content
     * @return Content
     */
    public function create(Request $request,Content $content){
        return $content
            ->header('新增平台')
            ->body($this->form());
    }

    /**
     * 显示平台详细信息
     * @param Content $content
     * @return Content
     */
    public function show($id,Content $content){
        return $content
            ->header('查看平台')
            ->body(
                $this->detail($id)
            );
    }

    public function edit($id,Content $content){
        return $content
            ->header('编辑平台')
            ->body(
                $this->form()->edit($id)
            );
    }
    /**
     * 显示所有平台信息
     * @return Grid
     */
    protected function grid(){
        $grid = new Grid($this->plat);
        $grid->disableExport();
        $grid->filter(function($filter){
            $filter->like('plat_name','平台名称');
        });
        $grid->model()->orderby('id','desc');
        $grid->id('ID')->sortable();
        $grid->plat_name('平台名称');
        $grid->created_at('创建时间');
        $grid->updated_at('更新时间');
        return $grid;
    }

    /**
     * 显示平台表单
     * @return Form
     */
    protected function form(){
        $form = new Form($this->plat);
        $form->text('plat_name', '平台名称');
        $form->footer(function($footer){
            $footer->disableViewCheck();
            $footer->disableEditingCheck();
        });
        return $form;
    }

    protected function detail($id){
        $show = new Show($this->plat->getInfoById($id));
        $show->id('ID');
        $show->plat_name('平台名称');
        $show->created_at('创建时间');
        $show->updated_at('更新时间');
        return $show;
    }

}
