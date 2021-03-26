<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ArticleModel extends Model
{
    //
    protected $table = 'article';
    private $pageSize = 5;

    public function insertArticle($data)
    {
        $this->title = $data['title'];
        $this->keywords = $data['keywords'];
        $this->author = $data['author'];
        $this->img_url = $data['img_url'];
        $this->cate_id = $data['cate_id'];
        $this->desc = $data['desc'];
        $this->content = $data['content'];
        $res = $this->save($data);
        if(false===$res) {
            return ['status' => 0, 'msg' => '添加失败'];
        }

        return ['status'=>1,'msg'=>'添加成功'];
    }


    //关联CateModel
    public function relateCate(){
        //关联模型，foreign_key，local_key
        return $this->hasOne('App\Model\CateModel','id','cate_id');
    }

    //获取所有文章
    public function getArticleList(){

        $field = ['a.id','a.title','a.img_url','a.views','a.updated_at','c.name as cate_name','a.desc'];
        return DB::table('article as a')->join('cate as c','a.cate_id','=','c.id')
            ->select($field)->orderBy('a.id','desc')->paginate($this->pageSize);
    }

    //取出指定文章
    public function getOne($id){
        return self::find($id);
    }

    //更新指定轮播图
    public function updOne($data,$id){
        $res = self::where('id',$id)->update($data);
        if(false===$res) {
            return ['status' => 0, 'msg' => '更新失败'];
        }

        return ['status'=>1,'msg'=>'更新成功'];
    }


    //删除指定文章
    public function delOne($id){
        $res = self::destroy($id);
        if(false===$res) {
            return ['status' => 0, 'msg' => '删除失败'];
        }

        return ['status'=>1,'msg'=>'删除成功'];
    }


    //获取关键字
    public function getKeywords(){
        $data = self::pluck('keywords');
        foreach ($data as $k=>$v){
            if(empty($v)){
                unset($data[$k]);
            }
        }
        return $data;
    }

    //获取最新文章 5条
    public function getArticleNewest(){

        return  $data =  self::select('title','id')->orderBy('id','desc')->limit(5)->get()->toArray();

    }

    //获取文章 - 类别id
    public function getArticleByCate($id){

        return self::where('cate_id',$id)->select('id','title','desc')->orderBy('id','desc')->paginate($this->pageSize);
    }

    //阅读量+1  todo:ip、登录非登录、重复用户判断
    public function viewInc($id){
        self::where('id',$id)->increment('views');
    }

    //获取相邻文章
    public function getPrevNext($id){
        self::where('id',$id)->increment('views');
    }

}
