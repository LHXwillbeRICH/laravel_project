<?php

namespace App\Admin\Controllers;

use App\Models\Users;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class UserController extends Controller
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
        $grid = new Grid(new Users);

        $grid->id('Id');
        $grid->realname('真实姓名');
        $grid->nickname('微信名称');
        $grid->phone('手机号');
        $grid->status('用户状态')->switch([
            'on'    =>['value'=>1,'text'=>'正常','color' => 'primary'],
            'off'   =>['value'=>2,'text'=>'删除','color' => 'default']
        ]);
        $grid->open_id('Open id');
        $grid->sex('性别')->using(['0'=>'女','1'=>'男']);
        $grid->img_url('头像')->image();
        $grid->created_at('Created at');

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
        $show = new Show(Users::findOrFail($id));

        $show->id('Id');
        $show->realname('真实姓名');
        $show->nickname('微信昵称');
        $show->phone('手机号');
        $show->union_id('Union id');
        $show->status('状态')->using(['0'=>'禁用','1'=>'正常']);
        $show->open_id('Open id');
        $show->sex('性别')->using(['0'=>'女','1'=>'男']);
        $show->img_url('头像')->image();
        $show->remember_token('Remember token');
        $show->created_at('创建时间');
        $show->updated_at('更新时间');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Users);

        $form->text('realname', '真实姓名');
        $form->text('nickname', '微信昵称');
        $form->text('phone', '手机号');
        $form->switch('status', '状态')->states([
            'on'    =>['value'=>1,'text'=>'正常','color' => 'primary'],
            'off'   =>['value'=>2,'text'=>'删除','color' => 'default']
        ]);
        $form->switch('sex', '性别')->states([
            'on'    =>['value'=>0,'text'=>'女','color' => 'primary'],
            'off'   =>['value'=>1,'text'=>'男','color' => 'default']
        ]);

        return $form;
    }
}
