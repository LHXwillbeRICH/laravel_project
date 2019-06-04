<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableGamePlatEquipment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_plat_equipment', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('g_id')->comment('游戏id');
            $table->integer('e_id')->comment('设备id');
            $table->integer('p_id')->comment('平台id');
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
        Schema::dropIfExists('game_plat_equipment');
    }
}
