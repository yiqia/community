<?php

namespace app\api\controller\v1;
use app\common\controller\BaseController;
use app\common\validate\ContentValidate;
use app\common\model\Content as ContentModel;

class Content extends BaseController
{
    //首页数据
    public function getContentData(){
        (new ContentValidate())->goCheck('content');
        $list=(new ContentModel())->getContentData();
        if(count($list)>0){
            return self::showData(200,'获取成功',$list);
        }else{
            return self::showData(210,'没有更多数据',$list,10004);
        }
    }
    //说说点赞
    public function sendGood(){
        (new ContentValidate())->goCheck('Id');
        $res=(new ContentModel())->sendGood();
        if($res){
            return self::showData(200,'点赞成功');
        }else{
            return self::showData(200,'取消赞成功');
        }
    }
    //评论一级点赞
    public function sendCommentGood(){
        (new ContentValidate())->goCheck('Id');
        $res=(new ContentModel())->sendCommentGood();
        if($res){
            return self::showData(200,'点赞成功');
        }else{
            return self::showData(200,'取消赞成功');
        }
    }
    //评论二级点赞
    public function sendCommentTwoGood(){
        (new ContentValidate())->goCheck('Id');
        $res=(new ContentModel())->sendCommentTwoGood();
        if($res){
            return self::showData(200,'点赞成功');
        }else{
            return self::showData(200,'取消赞成功');
        }
    }
    //收藏
    public function sendCollection(){
        (new ContentValidate())->goCheck('Id');
        $res=(new ContentModel())->sendCollection();
        if($res){
            return self::showData(200,'收藏成功');
        }else{
            return self::showData(200,'取消收藏成功');
        }
    }
    //举报
    public function sendReport(){
        (new ContentValidate())->goCheck('Id');
        $res=(new ContentModel())->sendReport();
        if($res) return self::showData(200,'举报成功');
        return self::showData('210','你已经举报了','',10010);
    }
    //发送一级评论
    public function sendComment(){
        (new ContentValidate())->goCheck('comment');
        $res=(new ContentModel())->sendComment();
        return self::showData(200,'评论成功',['Id'=>$res]);
    }
    //发送二级评论
    public function sendCommentTwo(){
        (new ContentValidate())->goCheck('comment');
        $res=(new ContentModel())->sendCommentTwo();
        return self::showData(200,'评论成功',['Id'=>$res]);
    }
    //获取评论信息
    public function getComment(){
        (new ContentValidate())->goCheck('getComment');
        $res=(new ContentModel())->getComment();
        if($res){
            return self::showData(200,'获取成功',$res);
        }else{
            return self::showData(210,'没有更多数据','',10004);
        }
    }
    //获取二级评论
    public function getCommentTwo(){
        (new ContentValidate())->goCheck('getComment');
        $res=(new ContentModel())->getCommentTwo();
        if($res){
            return self::showData(200,'获取成功',$res);
        }else{
            return self::showData(210,'没有更多数据','',10004);
        }
    }
    //关注
    public function sendFollow(){
        (new ContentValidate())->goCheck('Id');
        $res=(new ContentModel())->sendFollow();
        if($res){
            return self::showData(200,'关注成功');
        }else{
            return self::showData(200,'取消关注成功');
        }
    }
    //发送动态
    public function sendContent(){
        (new ContentValidate())->goCheck('community');
        $res=(new ContentModel())->sendContent();
        return self::showData(200,'发布成功');
    }
    //获取动态的类别
    public function  getCommunityType(){
        $res=(new ContentModel())->getCommunityType();
        return self::showData(200,'获取成功',$res);
    }
    //获取动态的详情
    public function  getCommunityInfo(){
        (new ContentValidate())->goCheck('Id');
        $res=(new ContentModel())->getCommunityInfo();
        return self::showData(200,'获取成功',$res);
    }
    //获取我的关注
    public function getMyFollow(){
        (new ContentValidate())->goCheck('content');
        $res=(new ContentModel())->getMyFollow();
        return self::showData(200,'获取成功',$res);
    }
    //获取最热
    public function getCommunityFire(){
        (new ContentValidate())->goCheck('content');
        $list=(new ContentModel())->getCommunityFire();
        if(count($list)>0){
            return self::showData(200,'获取成功',$list);
        }else{
            return self::showData(210,'没有更多数据',$list,10004);
        }
    }
    //删除说说
    public function removeCommunity(){
        (new ContentValidate())->goCheck('Id');
        (new ContentModel())->removeCommunity();
        return self::showData(200,'删除成功');
    }
    //获取我的发布
    public function getUserCommunity(){
        (new ContentValidate())->goCheck('Id');
        $res=(new ContentModel())->getUserCommunity();
        return self::showData(200,'获取成功',$res);

    }
    //获取用户的点赞 评论 粉丝等信息
    public function getUserCommunityIndex(){
        (new ContentValidate())->goCheck('Id');
        $res=(new ContentModel())->getUserCommunityIndex();
        return self::showData(200,'获取成功',$res);
    }
    //获取我的收藏
    public function myCollection(){
        $res=(new ContentModel())->myCollection();
        return self::showData(200,'获取成功',$res);
    }
    //新增访问
    public function addVisitorNumber(){
        (new ContentValidate())->goCheck('Id');
        $res=(new ContentModel())->addVisitorNumber();
        return self::showData(200,'加载成功');
    }
    //获取置顶
    public function getCommunityTop(){
        $res=(new ContentModel())->getCommunityTop();
        return self::showData(200,'获取成功',$res);
    }
    //取消置顶
    public function closeTop(){
        (new ContentValidate())->goCheck('Id');
        $res=(new ContentModel())->closeTop();
        return self::showData(200,'取消成功',$res);
    }
    //搜索动态
    public function searchAll(){
        (new ContentValidate())->goCheck('search');
        $res=(new ContentModel())->searchAll();
        return self::showData(200,'获取成功',$res);
    }
    //获取热门搜索
    public function getHotSearch(){
        $res=(new ContentModel())->getHotSearch();
        return self::showData(200,'获取成功',$res);
    }

}
