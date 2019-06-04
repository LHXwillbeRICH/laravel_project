<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActionLog extends Model
{
    //

    public function addInfo($info){
        return self::insert($info);
    }
}
