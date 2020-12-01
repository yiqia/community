<?php

namespace app\common\validate;

class TestValidate extends BaseValidate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */	
	protected $rule = [
	    'username'=>"require",
        'email'=>"require|email"
    ];
    
    /**
     * 定义错误信息
     * 格式：'字段名.规则名'	=>	'错误信息'
     *
     * @var array
     */	
    protected $message = [
        "username.require"=>"用户名必须要填写哦",
        "email.require"=>"邮箱必须要填写哦",
        "email.email"=>"邮箱格式不正确"
    ];
    protected $scene=[
      "login"=>['username']
    ];
}
