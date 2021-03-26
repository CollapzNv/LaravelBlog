<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Model\UserModel;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function login(Request $request)
    {
        //用户登录
        if($request->isMethod('post')){

            $username = trim($request->input('username'));
            $password = trim($request->input('password'));
            $code = trim($request->input('captcha'));

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
                //return response(['msg'=>$msg,'status'=>0]);
            }

            //注册
            $UserModel = new UserModel();
            $ret = $UserModel->checkUser($username,$password);
            if(0==$ret['status']){
                return response(['status'=>0,'msg'=>$ret['msg']]);
            }
            return response(['status'=>1,'msg'=>'登录成功']);
        }
        return view("home.user.login");
    }

    public function register(Request $request)
    {
        //用户注册
        if($request->isMethod('post')){

            $username = trim($request->input('username'));
            $password = trim($request->input('password'));
            $code = trim($request->input('captcha'));

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
                //return response(['msg'=>$msg,'status'=>0]);
            }

            //注册
            $UserModel = new UserModel();
            $ret = $UserModel->insertUser($username,$password);
            if(0==$ret['status']){
                return response(['status'=>0,'msg'=>'注册失败']);
            }
            return response(['status'=>1,'msg'=>'注册成功']);
        }
        return view("home.user.register");
    }

    //登出
    public function logout(){

        //todo:用户应该有token，否则谁都能退出
        session(['user'=>null]);
        return redirect('login');

    }

    //检测用户唯一性
    public function checkUser(Request $request){

        //cuznv 123456
        $username = trim($request->input('param'));
        //验证密码
        $UserModel = new UserModel();
        $ret = $UserModel->checkUserName($username);

        if(0==$ret['status']){
            return response(['status'=>'n','info'=>'用户名已被注册']);
        }else if(1==$ret['status']){
            return response(['status'=>'y','info'=>'用户名可以注册']);
        }
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
