<?php

namespace app\admin\controller;

use app\common\controller\BaseController;
use app\lib\exception\BaseException;
use app\common\validate\ContentValidate;
use think\Db;

class Feedback extends BaseController
{
    public function feedList(){
        return $this->fetch();
    }
    public function getList(){
        $res = input('get.');
        if($res){
            $page = $res['page'];
            if(!$res['page']){
                $page=1;
            }
        }else{
            $page=1;
        }

        $list=Db::table('yiqi_feedback')
            ->alias('c')
            ->join('yiqi_user u','c.user_id = u.Id')
            ->field('c.Id,c.content,c.contact,c.images,u.username,u.Id as user_id,u.nickname,u.avatar,c.create_time')
            ->group('c.Id')
            ->page($page)
            ->order('c.create_time','desc')
            ->select();
        $listNumber = Db::table('yiqi_feedback')->count();
        $re = ['code'=>0,'msg'=>'查询成功','count'=>$listNumber,'data'=>$list];
        return json($re);
    }
    public function delete(){
        (new contentValidate())->goCheck('Id');
        $res = input('get.');
        DB::table('yiqi_feedback')->where('Id',$res['Id'])->delete();
        return self::showData(200,"删除成功");
    }
}
