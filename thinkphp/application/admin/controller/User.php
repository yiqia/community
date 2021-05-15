<?php

namespace app\admin\controller;

use app\common\controller\BaseController;
use app\lib\exception\BaseException;
use think\Db;
use app\common\validate\UserValidate;
use think\Request;

class User extends BaseController
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //

        return $this->fetch();
    }
    public function exitLogin(){
        session(null);
       return redirect('/admin/login/login');
    }

    public function userList(){
        return $this->fetch();
    }
    public function getUserList(){
        $res = input('get.');
        if($res){
            $page = $res['page'];
            if(!$res['page']){
                $page=1;
            }
        }else{
            $page=1;
        }
        $list = Db::table('yiqi_user')->field('Id,username,email,create_time')->page($page)->select();
        $listNumber = Db::table('yiqi_user')->count();
        $re = ['code'=>0,'msg'=>'查询成功','count'=>$listNumber,'data'=>$list];
        return json($re);
    }
    public function deleteUser(){
        $res = input('get.');
        $Id = $res['Id'];
        if($Id==1){
            throw new BaseException(['msg'=>"默认未登录账号无法删除",'errorCode'=>1002]);
        }
        Db::table('yiqi_user')->where('Id',$Id)->delete();
        return self::showData(200,"删除成功");
    }
    public function editUser(){
        (new UserValidate())->goCheck('edit');
        $res = input('post.');
        if($res['password']){
            $password=password_hash($res['password'], PASSWORD_DEFAULT);
            $up = ['password'=>$password];
        }else{
            $up = ['email'=>$res['email']];
        }
        DB::table('yiqi_user')->where('username',$res['username'])->update($up);
        return self::showData(200,"修改成功");
    }
    public function userEdit(){
        return $this->fetch();
    }
    public function userPass(){
        return $this->fetch();
    }
    public function editPass(){
        $res = input('post.');
        DB::table('yiqi_admin')->where('username','admin')->update(['password'=>md5($res['password'])]);
        return self::showData(200,"修改成功");
    }
//    public function searchUser(){
//
//    }
}
