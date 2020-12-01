<?php

namespace app\http\middleware;

use app\common\model\User;
use app\lib\exception\BaseException;
class ApiUserAuth
{
    public function handle($request, \Closure $next)
    {
        if(array_key_exists('HTTP_TOKEN',$_SERVER)){
            $token=$_SERVER['HTTP_TOKEN'];
        }else{
            throw new BaseException(['code'=>210,'msg'=>"请先登录账号",'errorCode'=>10006]);
        }
        $user=(new User())->getUserInfo($token);
        if(!$user)throw new BaseException(['code'=>210,'msg'=>"登录失效，请重新登录",'errorCode'=>10005]);
        $request->userInfo=$user;
        return $next($request);
    }
}
