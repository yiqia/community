<?php

namespace app\http\middleware;
use app\lib\exception\BaseException;
class AdminUserAuth
{
    public function handle($request, \Closure $next)
    {
        $user_info=session("user_info");
        if($user_info==null){
            return redirect('/admin/login/login');
        }
        return $next($request);
    }
}
