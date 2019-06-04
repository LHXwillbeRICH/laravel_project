<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableStoreImgs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_imgs', function (Blueprint $table) {
            $table->engine='innoDB';
            $table->increments('id');
            $table->unsignedInteger('s_id')->index()->comment('商品id');
            $table->string('img_url')->comment('商品图片地址');
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
        Schema::dropIfExists('store_imgs');
    }
}
