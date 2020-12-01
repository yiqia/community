<?php

namespace app\index\controller;

use app\common\controller\BaseController;
use app\common\validate\TestValidate;

class Index extends BaseController
{

    public function index()
    {
        (new TestValidate())->goCheck('login');
    }
    public function testController(){
        $list=[
            ['id'=>10,"title"=>"测试","content"=>"内容"],
            ['id'=>2,"title"=>"测试2","content"=>"内容2"]
        ];
        return self::showData(200,"嘿嘿",$list);
       // return self::showEmpty(200,'没有数据');
    }

}
