<?php

namespace App\Providers;

use App\Model\CateModel;
use App\Model\ImageModel;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Model\SystemModel;
use App\Model\ArticleModel;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //数据共享

        $setting = [];
        //系统设置
        $systemModel = new SystemModel();
        $setting['SYSTEM'] = $systemModel->getSetting();

        //文章关键字
        $articleModel = new ArticleModel();
        $setting['KEYWORDS'] = $articleModel->getKeywords();

        //幻灯片
        $imageModel = new ImageModel();
        $setting['SLIDESHOW'] = $imageModel->getSlideShow();

        //文章列表
        $setting['ARTICLES'] = $articleModel->getArticleList();

        //最近发布 - 5条
        $setting['LATEST'] = $articleModel->getArticleNewest();

        //分类展示
        $cateModel = new CateModel();
        $setting['CATES'] = $cateModel->getCates();



        View::share($setting);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
