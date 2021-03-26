<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ImageModel extends Model
{
    //
    protected $table='image';
    public $timestamps = true;

    public function insertImage($data){

        $res = self::insert($data);
        if(false===$res) {
            return ['status' => 0, 'msg' => '添加失败'];
        }

        return ['status'=>1,'msg'=>'添加成功'];
    }

    //取出全部轮播图
    public function getImageList(){
        return self::get();
    }

    //取出指定轮播图
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

    //删除指定轮播图
    public function delOne($id){
        $res = self::destroy($id);
        if(false===$res) {
            return ['status' => 0, 'msg' => '删除失败'];
        }

        return ['status'=>1,'msg'=>'删除成功'];
    }

    //获取幻灯片 5张
    public function getSlideShow(){

        return  $data =  self::where('src','<>','null')->select('url','src')->orderBy('sort','desc')->limit(5)->get()->toArray();
    }
}
