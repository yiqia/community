<?php
// 一奇开源 QQ330729121
namespace app\common\model;

use app\lib\exception\BaseException;
use app\common\model\File as FileModel;
use think\facade\Cache;
use think\Model;
use think\db;
class User extends Model
{
    public function login(){
        $data=request()->post();
        $password=Db::table('yiqi_user')->where('username',$data['username'])->value('password');
        $isRight=password_verify( $data['password'], $password);
        if($isRight){
            $session_key=md5(uniqid(md5(microtime(true)).$data['username'],true));
            $hcToken=Cache::get($data['username']);
            $hcUser=Cache::get($hcToken);
            if($hcUser){
                Cache::rm($hcToken);
            }
            Cache::set($session_key,$data['username'],config('cacheTime'));
            Cache::set($data['username'],$session_key,config('cacheTime'));
            $userInfo=(new User())->getUserInfo($session_key);
            return ['token'=>$session_key,'userInfo'=>$userInfo];
        }else{
            throw new BaseException(['code'=>208,'msg'=>'用户不存在或者密码错误','errorCode'=>10003]);
        }
    }
    public function regUser(){
        $data=request()->post();
        $this->isUsername($data['username']);
        $password=password_hash($data['password'], PASSWORD_DEFAULT);
        $addData = ['username' => $data['username'], 'password' =>$password,'email'=>$data['email']];
        $res=Db::name('yiqi_user')->insert($addData);
        if($res){
            return true;
        }else{
            throw new BaseException(['msg'=>"注册失败，系统错误",'errorCode'=>1002]);
        }
    }
    /*
     * 判断是否存在该用户账号
     * */
    static function isUsername($user){
        $res=Db::table('yiqi_user')->where('username',$user)->find();
        if($res){
            throw new BaseException(['code'=>208,'msg'=>"账号已经存在",'errorCode'=>10001]);
        }
        return true;
    }
    //通过token获取用户信息
    static function getUserInfo($session_key=false){
        if($session_key){
            $token=$session_key;
        }else{
            if(array_key_exists('HTTP_TOKEN',$_SERVER)){
                $token=$_SERVER['HTTP_TOKEN'];
            }else{
                return false;
            }
        }
        $user=Cache::get($token);
        $res=Db::table("yiqi_user")->field('password,delete_time,openid,email,create_time,update_time',true)->where('username',$user)->find();
        if($res){
            return $res;
        }else{
            return false;
        }
    }
    //通过Id获取用户信息
    static function getIdUserInfo($Id=false){
        if(!$Id){
            return false;
        }
        $res=Db::table("yiqi_user")->field('password,delete_time,openid,email,create_time,update_time',true)->where('Id',$Id)->find();
        if($res){
            return $res;
        }else{
            return false;
        }
    }
    //更新头像
    public function uploadHeader(){
        $res=(new FileModel())->uploadFile();
        $userInfo=$this->getUserInfo();
        if($res){
            Db::table('yiqi_user')->where('Id',$userInfo['Id'])->update(['avatar'=>$res['src']]);
        }
        return $res['src'];
    }
    //更新名字
    public function updateName(){
        $data=request()->post();
        $userInfo=$this->getUserInfo();
        $res=Db::table('yiqi_user')->where('Id',$userInfo['Id'])->update(['nickname'=>$data['name']]);
        if($res)return true;
        throw new BaseException(['msg'=>"更换失败，稍后再试",'errorCode'=>1002]);
    }
    //修改密码
    public function changePassword(){
        $data=request()->post();
        $userInfo=$this->getUserInfo();
        $oldPassword=Db::table('yiqi_user')->where('Id',$userInfo['Id'])->value('password');
        $isRight=password_verify( $data['oldPassword'], $oldPassword);
        if($isRight){
            $password=password_hash($data['newPassword'], PASSWORD_DEFAULT);
            $res=Db::table('yiqi_user')->where('Id',$userInfo['Id'])->update(['password'=>$password]);
        }else{
            throw new BaseException(['code'=>208,'msg'=>'原密码错误','errorCode'=>10003]);
        }
        if($res)return true;
        throw new BaseException(['msg'=>"修改失败，稍后再试",'errorCode'=>1002]);
    }
    //提交反馈信息
    public function sendFeedback(){
        $data=request()->post();
        $userInfo=$this->getUserInfo();
        $res=Db::table('yiqi_feedback')->insert(['content'=>$data['content'],'user_id'=>$userInfo['Id'],'images'=>$data['images'],'contact'=>$data['contact']]);
        if($res)return true;
        throw new BaseException(['msg'=>"提交失败，稍后再试",'errorCode'=>1000]);
    }
}
