<?php

namespace app\api\controller\v1;
// 一奇开源 QQ330729121
use app\common\controller\BaseController;
use app\common\model\User as UserModel;
use app\common\validate\UserValidate;

class User extends BaseController
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        return 'ok';
    }
    public function login()
    {
        (new UserValidate())->goCheck('login');
        $login=(new UserModel())->login();
        return self::showData(200,"登录成功",$login);
    }
    public function regUser(){
        (new UserValidate())->goCheck('reg');
        (new UserModel())->regUser();
        return self::showData(200,"注册成功");
    }
    //更新头像
    public function uploadHeader(){
        $data=(new UserModel())->uploadHeader();
        return self::showData(200,"更换成功",$data);
    }
    //修改昵称
    public function updateName(){
        (new UserValidate())->goCheck('updateName');
        $data=(new UserModel())->updateName();
        return self::showData(200,"更换成功",$data);
    }
    //修改昵称
    public function changePassword(){
        (new UserValidate())->goCheck('updatePass');
        (new UserModel())->changePassword();
        return self::showData(200,"更换成功");
    }
    //反馈信息
    public function sendFeedback(){
        (new UserValidate())->goCheck('feedback');
        (new UserModel())->sendFeedback();
        return self::showData(200,"提交成功");
    }

}
