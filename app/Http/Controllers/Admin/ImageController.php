<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\ImageModel;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $img = new ImageModel();
        $list = $img->getImageList();
        return view('admin.image.index',['image_list'=>$list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.image.add');
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
            $img_path = 'uploads/'.date('Y-m-d');
            $img_name = time().'.'.$ext;
            if($img->move($img_path,$img_name)){
                return response(['status'=>1,'msg'=>$img_path.'/'.$img_name]);
            }
        }
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
        $data = $request->except('_token');

        $img = new ImageModel();
        $ret = $img->insertImage($data);
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
        $img = new ImageModel();
        $ret = $img->getOne($id);

        return view('admin.image.edit',['image'=>$ret]);
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
        $img = new ImageModel();
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
    }
}
