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
}
