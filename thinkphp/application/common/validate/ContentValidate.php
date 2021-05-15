<?php

namespace app\common\validate;



class ContentValidate extends BaseValidate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */	
	protected $rule = [
	    'page'=>"require|number",
        'Id'=>"require|number",
        "content"=>"require|max:250",
        'communityContent'=>"require|max:1000",
        'address'=>"max:100",
        'searchValue'=>"max:30|require"
    ];
    
    /**
     * 定义错误信息
     * 格式：'字段名.规则名'	=>	'错误信息'
     *
     * @var array
     */	
    protected $message = [
        'page.require'=>"必须要传递页码哦",
        'page.number'=>"页码必须是正整数哦",
        'Id.require'=>"参数有误，请刷新再试",
        'Id.number'=>"参数有误，请刷新再试",
        'content.require'=>'啥都不说评论什么呢',
        'content.max'=>'太多了，最多250个字',
        'communityContent.require'=>'啥都不说发什么呢',
        'communityContent.max'=>'太多了，最多1000个字',
        "address.max"=>"地点太长了",
        "searchValue.require"=>"没填东西怎么搜索呢"
    ];
    protected $scene=[
        "content"=>['page'],
        "Id"=>['Id'],
        'comment'=>['Id','content'],
        'getComment'=>['Id','page'],
        'community'=>['communityContent','address'],
        'addGroup'=>['content'],
        'search'=>['searchValue']
    ];
}
