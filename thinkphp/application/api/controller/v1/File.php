<?php

namespace app\api\controller\v1;

use app\common\controller\BaseController;
use think\Controller;
use think\Request;
use app\common\model\File as FileModel;
class File extends BaseController
{

    public function uploadFile(){
        $res=(new FileModel())->uploadFile();
        return self::showData(200,'上传成功',$res);
    }

}
