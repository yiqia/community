<?php
/**
 * Created by PhpStorm.
 * User: 33072
 * Date: 2020/7/21
 * Time: 14:48
 */

namespace app\lib\exception;
use Exception;
use think\exception\Handle;

class ExceptionHandler extends Handle
{
    public $code;
    public $msg;
    public $errorCode;
    public function render(Exception $e)
    {
        if($e instanceof BaseException){
            $this->code=$e->code;
            $this->msg=$e->msg;
            $this->errorCode=$e->errorCode;
        }else{
            if(config('app.app_debug'))return parent::render($e);
            $this->code=500;
            $this->msg="服务器异常";
            $this->errorCode="999";
        }
        $res=[
            "code"=>$this->code,
            "msg"=>$this->msg,
            "errorCode"=>$this->errorCode
        ];

        return json($res,$this->code);
    }
}