<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->engine ='InnoDB';
            $table->increments('id');
            $table->string('realname',10)->default('')->comment('真实姓名');
            $table->string('nickname',50)->comment('微信昵称');
            $table->char('iphone',11)->default('')->comment('手机号')->index();
            $table->string('union_id',100)->comment('微信unionID')->index();
            $table->tinyInteger('status')->default('1')->comment('用户状态 1正常 2删除');
            $table->string('img_url',255)->comment('微信头像');
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
        Schema::dropIfExists('admins');
    }
}
