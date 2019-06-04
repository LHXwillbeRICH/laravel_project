<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    /**
     * 获取banner图列表
     * @return mixed
     */
    function getBannerBySort(){
        return self::orderby('sort','desc')->get();
    }
}
