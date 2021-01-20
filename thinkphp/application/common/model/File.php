<?php
// 一奇开源 QQ330729121
namespace app\common\model;

use app\lib\exception\BaseException;
use think\Cache;
use think\Model;
use think\Config;
use Qiniu\Auth;// 引入鉴权类
use Qiniu\Storage\UploadManager;// 引入上传类
use app\common\model\User as UserModel;
class File extends Model
{
    public function uploadFile(){
        $user=(new UserModel())->getUserInfo();
        if(!$user) throw new BaseException(['code'=>500,'msg'=>"账号失效，请重新登录",'errorCode'=>10009]);
        $accessKey =config("ACCESSKEY");
        $secretKey = config("SECRETKEY");
        $auth = new Auth($accessKey, $secretKey);  //实例化
        $bucket=config("BUCKET");//存储空间
        $token = $auth->uploadToken($bucket);
        $uploadMgr = new UploadManager();
        $filePath = $_FILES['file']['tmp_name'];//'./php-logo.png';  //接收图片信息
        $fileName=$_FILES['file']['name'];
        $type = strtolower(substr($fileName,strrpos($fileName,'.')+1));//得到文件类型，并且都转化成小写
        $allow_type = array('jpg','jpeg','gif','png','mp4','mov','avi','flv'); //定义允许上传的类型

        //把非法格式的图片去除
        if (!in_array($type,$allow_type)){
            throw new BaseException(['code'=>500,'msg'=>"文件格式不合法",'errorCode'=>10010]);
        }else{
            $filename = md5(uniqid(md5(microtime(true)).time().rand(1,10000),true)).'.'.$type;
            list($ret, $err) = $uploadMgr->putFile($token, $filename, $filePath);
            if ($err !== null) {
                throw new BaseException(['code'=>500,'msg'=>"上传失败",'errorCode'=>10011]);
            } else{
                $src=config("DOMAIN").$ret['key'];
                $jieguo=[];
                if($type=='mp4' || $type=='mov' || $type=='avi' || $type=='flv'){
                    $jieguo['type']='video';
                    $jieguo['video']=$src;
                    $jieguo['src']=$src.'?vframe/jpg/offset/1';
                }else{
                    $jieguo['type']='image';
                    $jieguo['src']=$src;
                }
                return $jieguo;
            }
        }
    }
}
