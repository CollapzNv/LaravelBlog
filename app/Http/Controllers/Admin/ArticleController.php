<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\ArticleModel;
use App\Model\CateModel;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $article = new ArticleModel();
        $data = $article->getArticleList();
        return view('admin.article.index',['articles'=>$data]);
    }



    /*
     * 图片上传
     * */
    public function upload(Request $request){
        $img = $request->file('file');

        $allow_ext = ['png','jpeg','jpg','gif'];
        $allow_size = 1024*1024*3;
        if($img->isValid()){
            $ext = $img->getClientOriginalExtension();
            $size = $img->getSize();

            if(!in_array($ext,$allow_ext) || $size>$allow_size){
                return response(['status'=>0,'msg'=>'上传失败']);
            }

            //上传
            $img_path = 'uploads/article/'.date('Y-m-d');
            $img_name = time().'.'.$ext;
            if($img->move($img_path,$img_name)){
                return response(['status'=>1,'msg'=>$img_path.'/'.$img_name]);
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //分类列表
        $cate = new CateModel();

        return view('admin.article.add',["cates"=>$cate->getCates()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $input = $request->except('_token');
        $data = [
            'title'=>$input['title'],
            'keywords'=>$input['keywords'],
            'author'=>$input['author'],
            'img_url'=>$input['img_url'],
            'cate_id'=>$input['cate_id'],
            'desc'=>$input['desc'],
            'content'=>$input['content'],
        ];

        $img = new ArticleModel();
        $ret = $img->insertArticle($data);
        if(0==$ret['status']){
            return response(['status'=>0,'msg'=>$ret['msg']]);
        }
        return response(['status'=>1,'msg'=>'添加成功']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $img = new ArticleModel();
        $ret = $img->getOne($id);
        $cate = new CateModel();

        return view('admin.article.edit',['article'=>$ret,"cates"=>$cate->getCates()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = $request->except('_token','_method');

        $img = new ArticleModel();
        $ret = $img->updOne($data,$id);
        if(0==$ret['status']){
            return response(['status'=>0,'msg'=>'更新失败']);
        }
        return response(['status'=>1,'msg'=>'更新成功']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $img = new ArticleModel();
        $ret = $img->delOne($id);
        if(0==$ret['status']){
            return response(['status'=>0,'msg'=>'删除失败']);
        }
        return response(['status'=>1,'msg'=>'删除成功']);

    }
}
