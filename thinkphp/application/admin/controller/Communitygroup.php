<?php

namespace app\admin\controller;

use app\common\controller\BaseController;
use app\lib\exception\BaseException;
use app\common\validate\ContentValidate;
use think\Db;

class Communitygroup extends BaseController
{
    public function comList(){
        return $this->fetch();
    }
    public function add(){
        (new contentValidate())->goCheck('addGroup');
        $res = input('post.');
        DB::table('yiqi_community_group')->insert(['name'=>$res['content']]);
        return self::showData(200,"添加成功");
    }
    public function comAdd(){
        return $this->fetch();
    }
    public function delete(){
        (new contentValidate())->goCheck('Id');
        $res = input('get.');
        DB::table('yiqi_community_group')->where('Id',$res['Id'])->delete();
        return self::showData(200,"删除成功");
    }
    public function getList(){
        $res=Db::table('yiqi_community_group')->select();
        $listNumber = Db::table('yiqi_community_group')->count();
        $re = ['code'=>0,'msg'=>'查询成功','count'=>$listNumber,'data'=>$res];
        return $re;
    }
    public function comEdit(){
        return $this->fetch();
    }
    public function editContent(){
        (new contentValidate())->goCheck('comment');
        $res = input('post.');
        DB::table('yiqi_community_group')->where('Id',$res['Id'])->update(['name'=>$res['content']]);
        return self::showData(200,"修改成功");
    }
}
