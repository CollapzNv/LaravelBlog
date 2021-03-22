<?php

namespace App\Http\Controllers\Admin;

use App\Model\AdminModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /*
     * 登录
     * */
    public function login(Request $request){

        //cuznv 123456
        $name = trim($request->input('name'));
        $pwd = trim($request->input('password'));
        $code = trim($request->input('code'));

        //验证码
        $rule = ['code'=>'captcha'];
        $message = [
            'code.captcha'=>'验证码输入不正确'
        ];
        $validator = Validator::make([
            'code'=>$code
        ],$rule,$message);
        if($validator->fails()){
            $msg = $validator->errors()->first();
            //todo:return response(['msg'=>$msg,'status'=>0]);
        }

        //验证密码
        $adminModel = new AdminModel();
        $ret = $adminModel->checkLogin($name,$pwd);


        if(0==$ret['status']){
            return response(['status'=>0,'msg'=>$ret['msg']]);
        }
        //成功记录用户信息
        session(['username'=>$name]);
        return response(['status'=>1,'msg'=>'登录成功']);
    }


    //登出
    public function logout(){

        //todo:用户应该有token，否则谁都能退出
        session(['username'=>null]);
        return redirect('admin/login');

    }

    //检查原始密码 - ajax
    public function checkPass(Request $request){

        //cuznv 123456
        $name = session('username');
        $pwd = trim($request->input('param'));
        //验证密码
        $adminModel = new AdminModel();
        $ret = $adminModel->checkLogin($name,$pwd);

        if(0==$ret['status']){
            return response(['status'=>'n','info'=>'密码错误']);
        }else if(1==$ret['status']){
            return response(['status'=>'y','info'=>'正确']);
        }
    }

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
    public function edit($id)
    {
        //
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
