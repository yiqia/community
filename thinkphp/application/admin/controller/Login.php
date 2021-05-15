<?php

namespace app\admin\controller;

use app\common\controller\BaseController;
use app\lib\exception\BaseException;
use think\facade\Cache;
use think\Db;
use think\Request;

class Login extends BaseController
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function login()
    {
        //
        $param = input();
        if ($param) {//如果是post提交
            $username = $param['name'];
            if(!$username){
                throw new BaseException(['code'=>500,'msg'=>"用户名或者邮箱必填",'errorCode'=>10000]);
            }
            $password = $param['password'];
            if(!$password){
                throw new BaseException(['code'=>500,'msg'=>"密码必填",'errorCode'=>10000]);
            }
            $user = Db::table('yiqi_admin')->where('username',$username)->where('password',md5($password))->find();
            if($user){
                session('user_info', $user);
                $token=md5(uniqid(md5(microtime(true)).$param['name'],true));
                Cache::set('token',$token,3600);
                return self::showData(200,'登录成功',['token'=>$token]);
            }else{
                return self::showData(201,'密码错误');
            }
        }

        return $this->fetch();
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}
