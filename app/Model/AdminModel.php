<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AdminModel extends Model
{
    //
    protected $table = 'admin';

    public function checkLogin($name,$pwd){

        $user = self::where('name',$name)->select('name','pass','salt')->first();
        if(!$user){ return ['status'=>0,'msg'=>'此用户不存在'];}

        if(md5($pwd.$user['salt']) != $user['pass']){return ['status'=>0,'msg'=>'密码错误'];}

        return ['status'=>1,'msg'=>'验证成功'];
    }


    //更新密码
    public function updatePass($name,$pwd,$newpwd){

        $res =$this->checkLogin($name,$pwd);
        if(0==$res['status']){ return ['status'=>0,'msg'=>'用户错误，更新失败'];}


        $salt = str_random(6);
        $new_pass = md5($newpwd.$salt);
        $udpate = [
            'pass'=>$new_pass,
            'salt'=>$salt,
        ];

        $ret = self::where('name',$name)->update($udpate);
        if(false===$ret['status']) {
            return ['status' => 0, 'msg' => '更新失败'];
        }

        return ['status'=>1,'msg'=>'更新成功'];
    }
}
