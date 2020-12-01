<?php

namespace app\admin\controller;

use app\common\controller\BaseController;
use app\lib\exception\BaseException;
use think\Db;

class Community extends BaseController
{
    public function comList(){
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

        $list=Db::table('yiqi_community')
            ->alias('c')
            ->join('yiqi_user u','c.user_id = u.Id')
            ->leftJoin('yiqi_community_group g','c.group_id = g.Id')
            ->leftJoin('yiqi_user_group ug','u.group = ug.Id')
            ->field('c.Id,c.content,c.address,c.location,c.images,c.video,c.create_time,u.username,u.Id as user_id,u.nickname,u.avatar,g.name as groupName,g.Id as groupId,ug.Id as userGroupId,ug.name as userGroupName,ug.type as userGroupType')
            ->group('c.Id')
            ->page($page)
            ->order('create_time','desc')
            ->select();
        $listNumber = Db::table('yiqi_user')->count();
        $re = ['code'=>0,'msg'=>'查询成功','count'=>$listNumber,'data'=>$list];
        return json($re);
    }

    public function delete(){
        $res = input('get.');
        $Id = $res['Id'];
        Db::table('yiqi_community')->where('Id',$Id)->delete();
        return self::showData(200,"删除成功");
    }
}
