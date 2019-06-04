<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->increments('id');
            $table->string('game_name',50)->comment('游戏名称');
            $table->tinyInteger('game_type')->comment('游戏类型 1手游 2H5');
            $table->tinyInteger('is_host')->default(2)->comment('是否热门 1是 2否');
            $table->text('game_details')->comment('游戏描述');
            $table->string('game_logo')->comment('游戏logo');
            $table->string('game_initial')->comment('游戏首字母');
            $table->softDeletes()->comment('是否删除');
            $table->unique('game_name');
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
        Schema::dropIfExists('games');
    }
}
