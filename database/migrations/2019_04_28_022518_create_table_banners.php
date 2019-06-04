<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBanners extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->increments('id');
            $table->string('banner_name',20)->comment('banner名称');
            $table->string('banner_img')->comment('banner图存储地址');
            $table->string('banner_url')->comment('banner图的连接地址');
            $table->tinyInteger('sort')->unsigned()->comment('排序');
            $table->tinyInteger('is_show')->default(1)->unsigned()->comment('是否显示 1是 2否');
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
        Schema::dropIfExists('banners');
    }
}
