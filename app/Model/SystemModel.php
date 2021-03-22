<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SystemModel extends Model
{
    //
    protected $table = "system";
    public $timestamps = false;

    public function getSetting(){

        return self::first();
    }

    public function updateSetting($data){

        $res = self::where('id',$data['id'])->update($data);

        if(false===$res) {
            return ['status' => 0, 'msg' => '更新失败'];
        }

        return ['status'=>1,'msg'=>'更新成功'];

    }
}
