<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTransactionFlow extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_flow', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('account')->comment('账户余额');
            $table->unsignedInteger('money')->comment('提现金额');
            $table->unsignedInteger('u_id')->comment('提现用户');
            $table->unsignedTinyInteger('status')->default(0)->comment('状态 0 处理中 1成功 2失败');
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
        Schema::dropIfExists('transaction_flow');
    }
}
