<?php

namespace App\Admin\Controllers;

use App\Models\Banner;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class BannerController extends Controller
{
    use HasResourceActions;

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
        $grid = new Grid(new Banner);
        $grid->disableExport();
        $grid->id('Id');
        $grid->banner_name('名称');
        $grid->banner_img('图片')->image();
        $grid->banner_url('连接地址')->link();
        $grid->sort('排序');
        $grid->is_show('是否显示')->switch();

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
        $show = new Show(Banner::findOrFail($id));

        $show->id('Id');
        $show->banner_name('Banner名称');
        $show->banner_img('Banner img')->image();
        $show->banner_url('Banner连接地址')->link();
        $show->sort('排序');
        $show->is_show('是否显示')->using([1=>'是',2=>'否']);
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
        $form = new Form(new Banner);
        $form->footer(function($footer){
            $footer->disableViewCheck();  //去掉查看按钮
            $footer->disableEditingCheck();//去掉继续编辑按钮
        });
        $form->text('banner_name', 'Banner名称');
        $form->image('banner_img', 'Banner img')->move('images/banner');
        $form->url('banner_url', 'Banner连接地址')->placeholder('必须以http://');
        $form->text('sort', '排序')->placeholder('数字越大排序越靠前');
        $states = [
            'on'  => ['value' => 1, 'text' => '是', 'color' => 'success'],
            'off' => ['value' => 2, 'text' => '否', 'color' => 'danger'],
        ];

        $form->switch('is_show', '是否显示')->states($states);

        return $form;
    }
}
