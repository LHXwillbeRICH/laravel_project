<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAccountBalance extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_balance', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('u_id')->comment('用户id');
            $table->unsignedInteger('account')->comment('用户余额');
            $table->index('u_id');
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
        Schema::dropIfExists('account_balance');
    }
}
