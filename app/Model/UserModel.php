<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    //
    protected $table = 'user';

    public function insertUser($username,$password){

        $this->salt = str_random(6);
        $this->password = md5($password.$this->salt);
        $this->username = $username;


        $res = $this->save();
        if(false===$res) {
            return ['status' => 0, 'msg' => '添加失败'];
        }

        return ['status'=>1,'msg'=>'添加成功'];
    }

    //验证唯一性
    public function checkUserName($username){

        $exist = self::where('username',$username)->first();
        if($exist){
            return ['status' => 0, 'msg' => '无法注册'];
        }
         return ['status' => 1, 'msg' => '可以注册'];

    }

    //验证用户
    public function checkUser($username,$password){
        $user = self::where('username',$username)->select('username','password','salt')->first();
        if(!$user){ return ['status'=>0,'msg'=>'此用户不存在'];}

        if(md5($password.$user['salt']) != $user['password']){return ['status'=>0,'msg'=>'密码错误'];}

        //成功记录用户信息
        session(['user'=>$username]);
        return ['status'=>1,'msg'=>'验证成功'];
    }

}
