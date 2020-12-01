<?php

namespace app\http\middleware;
use think\db;

class ApiCommunityAuth
{
    public function handle($request, \Closure $next)
    {
        $userInfo=$request->userInfo;
        $res=$request->param();
        $sql=Db::table('yiqi_community_show')->where('user_id',$userInfo['Id'])->where('community_id',$res['Id'])->find();
        if(!$sql){
            Db::table('yiqi_community_show')->insert(['user_id'=>$userInfo['Id'],'community_id'=>$res['Id']]);
        }
        return $next($request);
    }
}
