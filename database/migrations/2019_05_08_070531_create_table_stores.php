<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableStores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->increments('id');
            $table->engine='InnoDb';
            $table->string('store_name',50)->comment('商品名称');
            $table->decimal('store_price',8,0)->comment('商品价格 单位分');
            $table->unsignedTinyInteger('trade_id')->comment('商品类型 1游戏账号 2首充号 3其他');
            $table->text('store_content')->comment('商品描述');
            $table->unsignedTinyInteger('store_sale')->comment('商品打折信息');
            $table->unsignedTinyInteger('store_status')->default(1)->comment('商品状态 1待出售 2交易中 3已下架');
            $table->unsignedInteger('store_count')->default(1)->comment('商品数量');
            $table->unsignedInteger('g_id')->comment('游戏id');
            $table->string('game_address',15)->comment('游戏区服');
            $table->string('game_account',20)->comment('游戏账号');
            $table->string('game_password',50)->comment('游戏密码');
            $table->string('game_role',20)->comment('游戏角色名称');
            $table->unsignedTinyInteger('equipment_id')->comment('游戏设备 1安卓 2苹果 3PC');
            $table->unsignedInteger('plat_id')->comment('平台id');
            $table->unsignedInteger('u_id')->comment('用户id');
            $table->unsignedTinyInteger('is_recommend')->default(2)->comment('是否推荐 1推按 2不推荐');
            $table->unsignedTinyInteger('review')->default(0)->comment('审核是否通过 1通过 2未通过 0待审核');
            $table->timestamps();
            $table->index('u_id');
            $table->index('plat_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stores');
    }
}
