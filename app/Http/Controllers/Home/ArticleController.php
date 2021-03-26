<?php

namespace App\Http\Controllers\Home;

use App\Model\ArticleModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    //

    public function index(){

        return view('home.article.index');
    }

    public function detail($id){


        $articleModel = new ArticleModel();
        $article = $articleModel->getOne($id);

        //增加阅读量
        $articleModel->viewInc($id);

        //获取上下篇文章
        $articleModel->getPrevNext($id);

        return view('home.article.detail',['article'=>$article]);
    }

}
