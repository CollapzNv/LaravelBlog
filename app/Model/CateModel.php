<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CateModel extends Model
{
    //文章分类表
    protected $table = 'cate';
    //public $timestamps = false;

    public function getCates(){

        return self::get();
    }
}
