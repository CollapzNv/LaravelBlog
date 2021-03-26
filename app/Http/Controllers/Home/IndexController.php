<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\CateModel;

class IndexController extends Controller
{
    //首页
    public function index(){


        //分类

        $cate = new CateModel();

        return view("home.index",['cates'=>$cate->getCates()]);
    }


}
