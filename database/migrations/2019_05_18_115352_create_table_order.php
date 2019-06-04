<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('s_id')->comment('商品id');
            $table->unsignedInteger('price')->comment('价格');
            $table->string('order_code')->comment('订单编号');
            $table->tinyInteger('status')->default(1)->comment('订单状态  1 未支付 2 待发货 3待确认收货  4 交易成功 9已删除');
            $table->string('phone',11)->comment('手机号');
            $table->string('qq',15)->comment('qq号');
            $table->text('order_des')->comment('订单描述');
            $table->unsignedInteger('u_id')->comment('购买者id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
