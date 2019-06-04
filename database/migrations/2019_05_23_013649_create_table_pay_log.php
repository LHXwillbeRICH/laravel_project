<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePayLog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pay_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('u_id')->comment('支付用户');
            $table->unsignedTinyInteger('status')->comment('支付状态');
            $table->string('msg')->coment('返回信息')->comment('错误描述');
            $table->string('pay_type')->comment('支付类型');
            $table->unsignedTinyInteger('tory')->default(1)->comment('同步日志还是异步日志 1异步 2同步');
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
        Schema::dropIfExists('pay_logs');
    }
}
