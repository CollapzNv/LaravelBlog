<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\SystemModel;

class SystemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $system = new SystemModel();
        $data = $system->getSetting();

        return view('admin.system.index',['setting'=>$data]);
    }

    //修改
    public function edit()
    {
        //
        $system = new SystemModel();
        $data = $system->getSetting();

        return view('admin.system.edit',['setting'=>$data]);
    }


    //更新
    public function update(Request $request)
    {
        //
        $data = $request->except('_token');

        $system = new SystemModel();
        $ret = $system->updateSetting($data);
        if(0==$ret['status']){
            return response(['status'=>0,'msg'=>'修改失败']);
        }
        return response(['status'=>1,'msg'=>'修改成功']);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
/*    public function edit($id)
    {
        //
    }*/


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
