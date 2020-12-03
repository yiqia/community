<?php

namespace app\common\model;

use think\db;
use think\Model;
use app\common\model\User as UserModel;
use app\lib\exception\BaseException;


class Content extends Model
{
    //获取内容
    public function getContentData(){
        $data=request()->get();
        $userInfo=(new User())->getUserInfo();
//        Db::listen(function ($sql, $time, $explain) {
//            // 记录SQL
//            echo  ' [' . $time . 's]';
//            // 查看性能分析结果
//            dump($explain);
//        });
        $group_id=1;
        $isGroup=array_key_exists('group_id',$data);
        if($isGroup){
            $group_id=$data['group_id'];
        }
        $good=DB::table('yiqi_good')->field('count(community_id)')->where('community_id','c.Id')->buildSql();
        $show=DB::table('yiqi_community_show')->field('count(community_id)')->where('community_id','c.Id')->buildSql();
        $collection=DB::table('yiqi_collection')->field('count(community_id)')->where('community_id','c.Id')->buildSql();
        $comment=DB::table('yiqi_comment')->field('count(community_id)')->where('community_id','c.Id')->buildSql();
        //如果没有登录账号
        if(!$userInfo){
            if(!$isGroup){
                $list=Db::table('yiqi_community')
                    ->alias('c')
                    ->join('yiqi_user u','c.user_id = u.Id')
                    ->leftJoin('yiqi_community_group g','c.group_id = g.Id')
                    ->leftJoin('yiqi_user_group ug','u.group = ug.Id')
                    ->field('c.Id,c.content,c.address,c.location,c.images,c.video,c.create_time,u.username,u.nickname,u.Id as user_id,u.avatar,g.name as groupName,g.Id as groupId,ug.Id as userGroupId,ug.name as userGroupName,ug.type as userGroupType,'
                        .$good.' as good,'.$collection.' as collection,'.$comment.' as comment,'.$show.' as showNumber')
                    ->group('c.Id')
                    ->page($data['page'])
                    ->order('create_time','desc')
                    ->where('isRemove',0)
                    ->select();
            }else{
                $list=Db::table('yiqi_community')
                    ->alias('c')
                    ->join('yiqi_user u','c.user_id = u.Id')
                    ->leftJoin('yiqi_community_group g','c.group_id = g.Id')
                    ->leftJoin('yiqi_user_group ug','u.group = ug.Id')
                    ->field('c.Id,c.content,c.address,c.location,c.images,c.video,c.create_time,u.username,u.nickname,u.Id as user_id,u.avatar,g.name as groupName,g.Id as groupId,ug.Id as userGroupId,ug.name as userGroupName,ug.type as userGroupType,'
                        .$good.' as good,'.$collection.' as collection,'.$comment.' as comment,'.$show.' as showNumber')
                    ->group('c.Id')
                    ->page($data['page'])
                    ->where('group_id',$group_id)
                    ->where('isRemove',0)
                    ->order('create_time','desc')
                    ->select();
            }
        }else{
            //是否关注
            $isFollow=DB::table('yiqi_follow')->field('count(follow_user_id)')->where('user_id',$userInfo['Id'])->where('follow_user_id','c.user_id')->buildSql();
            //是否点赞
            $isGood=DB::table('yiqi_good')->field('count(community_id)')->where('user_id',$userInfo['Id'])->where('community_id','c.Id')->buildSql();
            //是否收藏
            $isCollection=DB::table('yiqi_collection')->field('count(community_id)')->where('user_id',$userInfo['Id'])->where('community_id','c.Id')->buildSql();
            if(!$isGroup){
                $list=Db::table('yiqi_community')
                    ->alias('c')
                    ->join('yiqi_user u','c.user_id = u.Id')
                    ->leftJoin('yiqi_community_group g','c.group_id = g.Id')
                    ->leftJoin('yiqi_user_group ug','u.group = ug.Id')
                    ->field('c.Id,c.content,c.address,c.location,c.images,c.video,c.create_time,u.username,u.Id as user_id,u.nickname,u.avatar,g.name as groupName,g.Id as groupId,ug.Id as userGroupId,ug.name as userGroupName,ug.type as userGroupType,'
                        .$good.' as good,'.$collection.' as collection,'.$isFollow.' as isFollow,'.$comment.' as comment,'
                        .$isGood.' as isGood,'.$isCollection.' as isCollection,'.$show.' as showNumber')
                    ->group('c.Id')
                    ->where('isRemove',0)
                    ->page($data['page'])
                    ->order('create_time','desc')
                    ->select();
            }else{
                $list=Db::table('yiqi_community')
                    ->alias('c')
                    ->join('yiqi_user u','c.user_id = u.Id')
                    ->leftJoin('yiqi_community_group g','c.group_id = g.Id')
                    ->leftJoin('yiqi_user_group ug','u.group = ug.Id')
                    ->field('c.Id,c.content,c.address,c.location,c.images,c.video,c.create_time,u.username,u.Id as user_id,u.nickname,u.avatar,g.name as groupName,g.Id as groupId,ug.Id as userGroupId,ug.name as userGroupName,ug.type as userGroupType,'
                        .$good.' as good,'.$collection.' as collection,'.$isFollow.' as isFollow,'.$comment.' as comment,'
                        .$isGood.' as isGood,'.$isCollection.' as isCollection,'.$show.' as showNumber')
                    ->group('c.Id')
                    ->where('group_id',$group_id)
                    ->where('isRemove',0)
                    ->page($data['page'])
                    ->order('create_time','desc')
                    ->select();
            }

        }
        return $list;
    }
    //点赞
    public function sendGood(){
        $data=request()->get();
        $community=$this->isHaveContent($data['Id']);
        $userInfo=(new UserModel())->getUserInfo();
        //看看有没有点赞 有的话就取消 没有的话就点
        $isHaveGood=Db::table("yiqi_good")->where('user_id',$userInfo['Id'])->where("community_id",$data['Id'])->find();
        if($isHaveGood){
            $res=Db::table("yiqi_good")->where('user_id',$userInfo['Id'])->where("community_id",$data['Id'])->delete();
            if($res){
                return false;
            }else{
                throw new BaseException(['code'=>400,'msg'=>"取消点赞失败,请稍后重试",'errorCode'=>10007]);
            }
        }else{
            $res=Db::table("yiqi_good")->insert(['user_id'=>$userInfo['Id'],'community_id'=>$data['Id'],'to_user_id'=>$community['user_id']]);
            if($res){
                return true;
            }else{
                throw new BaseException(['code'=>400,'msg'=>"点赞失败,请稍后重试",'errorCode'=>10008]);
            }
        }
    }
    //收藏说说
    public function sendCollection(){
        $data=request()->get();
        $this->isHaveContent($data['Id']);
        $userInfo=(new UserModel())->getUserInfo();
        //看看有没有收藏 有的话就取消 没有的话就收藏
        $isHaveGood=Db::table("yiqi_collection")->where('user_id',$userInfo['Id'])->where("community_id",$data['Id'])->find();
        if($isHaveGood){
            $res=Db::table("yiqi_collection")->where('user_id',$userInfo['Id'])->where("community_id",$data['Id'])->delete();
            if($res){
                return false;
            }else{
                throw new BaseException(['code'=>400,'msg'=>"取消收藏失败,请稍后重试",'errorCode'=>10007]);
            }
        }else{
            $res=Db::table("yiqi_collection")->insert(['user_id'=>$userInfo['Id'],'community_id'=>$data['Id']]);
            if($res){
                return true;
            }else{
                throw new BaseException(['code'=>400,'msg'=>"收藏失败,请稍后重试",'errorCode'=>10008]);
            }
        }
    }
    //举报
    public function sendReport(){
        $data=request()->get();
        $userInfo=(new UserModel())->getUserInfo();
        $community=$this->isHaveContent($data['Id']);
        $report=$this->isReport($data['Id'],$userInfo['Id']);
        if($report){
            return false;
        }else{
            $res=Db::table('yiqi_community_report')->insert(['content'=>$community['content'],'images'=>$community['images'],
                'video'=>$community['video'],'community_id'=>$community['Id'],'user_id'=>$community['user_id'],'report_user_id'=>$userInfo['Id']
                ]);
            if($res) return true;
            throw new BaseException(['code'=>500,'msg'=>"数据添加失败，稍后再试",'errorCode'=>10008]);
        }
    }
    //是否存在该条举报信息
    public function isReport($Id,$userId){
        $res=Db::table('yiqi_community_report')->where('community_id',$Id)->where('report_user_id',$userId)->find();
        if(!$res) return false;
        return $res;
    }
    //评论一级点赞
    public function  sendCommentGood(){
        $data=request()->get();
        $userInfo=(new UserModel())->getUserInfo();
        $community=$this->isHaveComment($data['Id']);
        $isHaveGood=Db::table("yiqi_comment_good")->where('user_id',$userInfo['Id'])->where("comment_id",$data['Id'])->find();
        if($isHaveGood){
            $res=Db::table("yiqi_comment_good")->where('user_id',$userInfo['Id'])->where("comment_id",$data['Id'])->delete();
            if($res){
                return false;
            }else{
                throw new BaseException(['code'=>400,'msg'=>"取消点赞失败,请稍后重试",'errorCode'=>10007]);
            }
        }else{
            $res=Db::table("yiqi_comment_good")->insert(['user_id'=>$userInfo['Id'],'comment_id'=>$data['Id'],'to_user_id'=>$community['user_id']]);
            if($res){
                return true;
            }else{
                throw new BaseException(['code'=>400,'msg'=>"点赞失败,请稍后重试",'errorCode'=>10008]);
            }
        }
    }
    //二级评论点赞
    public function sendCommentTwoGood(){
        $data=request()->get();
        $userInfo=(new UserModel())->getUserInfo();
        $community=$this->isHaveCommentTwo($data['Id']);
        $isHaveGood=Db::table("yiqi_comment_two_good")->where('user_id',$userInfo['Id'])->where("comment_two_id",$data['Id'])->find();
        if($isHaveGood){
            $res=Db::table("yiqi_comment_two_good")->where('user_id',$userInfo['Id'])->where("comment_two_id",$data['Id'])->delete();
            if($res){
                return false;
            }else{
                throw new BaseException(['code'=>400,'msg'=>"取消点赞失败,请稍后重试",'errorCode'=>10007]);
            }
        }else{
            $res=Db::table("yiqi_comment_two_good")->insert(['user_id'=>$userInfo['Id'],'comment_two_id'=>$data['Id'],'to_user_id'=>$community['Id']]);
            if($res){
                return true;
            }else{
                throw new BaseException(['code'=>400,'msg'=>"点赞失败,请稍后重试",'errorCode'=>10008]);
            }
        }
    }
    //发送一级评论
    public function sendComment(){
        $data=request()->post();
        $userInfo=(new UserModel())->getUserInfo();
        $community=$this->isHaveContent($data['Id']);
        $res=Db::table('yiqi_comment')->insertGetId(['user_id'=>$userInfo['Id'],'content'=>$data['content'],'community_id'=>$data['Id'],'to_user_id'=>$community['user_id']]);
        if($res) return $res;
        throw new BaseException(['code'=>500,'msg'=>"数据添加失败，稍后再试",'errorCode'=>10008]);
    }
    //二级评论
    public function sendCommentTwo(){
        $data=request()->post();
        $userInfo=(new UserModel())->getUserInfo();
        $community=$this->isHaveComment($data['Id']);
        $res=Db::table('yiqi_comment_two')->insertGetId(['user_id'=>$userInfo['Id'],'content'=>$data['content'],'comment_id'=>$data['Id'],'to_user_id'=>$community['user_id']]);
        if($res) return $res;
        throw new BaseException(['code'=>500,'msg'=>"数据添加失败，稍后再试",'errorCode'=>10008]);
    }
    //有没有该条一级评论的信息
    public function isHaveComment($Id){
        $res=Db::table('yiqi_comment')->where("Id",$Id)->find();
        if(!$res) throw new BaseException(['code'=>500,'msg'=>"没有找到这条说说",'errorCode'=>10009]);
        return $res;
    }
    //有没有该条二级评论的信息
    public function isHaveCommentTwo($Id){
        $res=Db::table('yiqi_comment_two')->where("Id",$Id)->find();
        if(!$res) throw new BaseException(['code'=>500,'msg'=>"没有找到这条说说",'errorCode'=>10009]);
        return $res;
    }
    //有没有该条说说信息
    public function isHaveContent($Id){
        $res=Db::table('yiqi_community')->where("Id",$Id)->find();
        if(!$res) throw new BaseException(['code'=>500,'msg'=>"没有找到这条说说",'errorCode'=>10009]);
        return $res;
    }
    //查看说说下面的评论
    public function getComment(){
        $data=request()->get();
        $userInfo=(new UserModel())->getUserInfo();
        $this->isHaveContent($data['Id']);
        //点赞查询
        $good=Db::table('yiqi_comment_good')->field('count(comment_id)')->where('comment_id','c.Id')->buildSql();
        if(!$userInfo){
            $res=Db::table('yiqi_comment')
                ->alias('c')
                ->join('yiqi_user u','c.user_id = u.Id')
                ->where('community_id',$data['Id'])
                ->field('c.Id,c.content,c.create_time,u.username,u.Id as user_id,u.nickname,u.avatar,u.`sign`,'.$good.' as good')
                ->order('good','desc')
                ->page($data['page'])
                ->select();
            foreach ($res as $key=>$value){
                $cId=$value['Id'];
                $twoGood=Db::table('yiqi_comment_two_good')->field('count(comment_two_id)')->where('comment_two_id','t.Id')->buildSql();
                $twoRes=Db::table('yiqi_comment_two')
                    ->alias('t')
                    ->join('yiqi_user u','t.user_id = u.Id')
                    ->where('comment_id',$cId)
                    ->field('t.Id,t.content,t.create_time,u.username,u.Id as user_id,u.nickname,u.avatar,u.`sign`,'.$twoGood.' as good')
                    ->order('good','desc')
                    ->limit(0,20)
                    ->select();
                $res[$key]['twoComment']=$twoRes;
            }
        }else{
            $isGood=Db::table('yiqi_comment_good')->field('count(comment_id)')->where('comment_id','c.Id')->where('user_id',$userInfo['Id'])->buildSql();
            $res=Db::table('yiqi_comment')
                ->alias('c')
                ->join('yiqi_user u','c.user_id = u.Id')
                ->where('community_id',$data['Id'])
                ->field('c.Id,c.content,c.create_time,u.username,u.Id as user_id,u.nickname,u.avatar,u.`sign`,'.$good.' as good,'.$isGood.' as isGood')
                ->order('good','desc')
                ->page($data['page'])
                ->select();
            foreach ($res as $key=>$value){
                $cId=$value['Id'];
                $twoGood=Db::table('yiqi_comment_two_good')->field('count(comment_two_id)')->where('comment_two_id','t.Id')->buildSql();
                $twoIsGood=Db::table('yiqi_comment_two_good')->field('count(comment_two_id)')
                    ->where('comment_two_id','t.Id')
                    ->where('user_id',$userInfo['Id'])
                    ->buildSql();
                $twoRes=Db::table('yiqi_comment_two')
                    ->alias('t')
                    ->join('yiqi_user u','t.user_id = u.Id')
                    ->where('comment_id',$cId)
                    ->field('t.Id,t.content,t.create_time,u.username,u.Id as user_id,u.nickname,u.avatar,u.`sign`,'.$twoGood.' as good,'.$twoIsGood.' as isGood')
                    ->order('good','desc')
                    ->limit(0,20)
                    ->select();
                $res[$key]['twoComment']=$twoRes;
            }
        }

        return $res;

    }
    //获取二级评论
    public function getCommentTwo(){
        $data=request()->get();
        $userInfo=(new UserModel())->getUserInfo();
        $this->isHaveContent($data['Id']);
        //点赞查询
        $twoGood=Db::table('yiqi_comment_two_good')->field('count(comment_two_id)')->where('comment_two_id','t.Id')->buildSql();
        if(!$userInfo){
            $twoRes=Db::table('yiqi_comment_two')
                ->alias('t')
                ->join('yiqi_user u','t.user_id = u.Id')
                ->where('comment_id',$data['Id'])
                ->field('t.Id,t.content,t.create_time,u.username,u.Id as user_id,u.nickname,u.avatar,u.`sign`,'.$twoGood.' as good')
                ->order('good','desc')
                ->page($data['page'])
                ->select();
        }else{
            $twoIsGood=Db::table('yiqi_comment_two_good')->field('count(comment_two_id)')
                ->where('comment_two_id','t.Id')
                ->where('user_id',$userInfo['Id'])
                ->buildSql();
            $twoRes=Db::table('yiqi_comment_two')
                ->alias('t')
                ->join('yiqi_user u','t.user_id = u.Id')
                ->where('comment_id',$data['Id'])
                ->field('t.Id,t.content,t.create_time,u.username,u.Id as user_id,u.nickname,u.avatar,u.`sign`,'.$twoGood.' as good,'.$twoIsGood.' as isGood')
                ->order('good','desc')
                ->page($data['page'])
                ->select();
        }
        return $twoRes;
    }
    public function sendFollow(){
        $data=request()->get();
        $userInfo=(new UserModel())->getUserInfo();
        $this->isHaveUser($data['Id']);
        $isHaveFollow=$this->isHaveFollow($userInfo['Id'],$data['Id']);
        if($isHaveFollow){
            Db::table('yiqi_follow')->where("user_id",$userInfo['Id'])->where('follow_user_id',$data['Id'])->delete();
            return false;
        }else{
            $res=Db::table('yiqi_follow')->insert(['user_id'=>$userInfo['Id'],'follow_user_id'=>$data['Id']]);
            return true;
        }
        throw new BaseException(['code'=>500,'msg'=>"关注异常，稍后再试",'errorCode'=>10000]);
    }
    //是否存在该用户
    public function isHaveUser($Id){
        $res=Db::table('yiqi_user')->where("Id",$Id)->find();
        if(!$res) throw new BaseException(['code'=>500,'msg'=>"没有找到该用户",'errorCode'=>10009]);
        return $res;
    }
    //是否关注该用户
    public function isHaveFollow($my,$he){
        $res=Db::table('yiqi_follow')->where("user_id",$my)->where('follow_user_id',$he)->find();
        if(!$res) return false;
        return true;
    }
    //获取社区的类别
    public function getCommunityType(){
        $res=Db::table('yiqi_community_group')->select();
        return $res;
    }
    //发送动态内容
    public function sendContent(){
        $data=request()->post();
        $userInfo=(new UserModel())->getUserInfo();
        if($data['isTop']){
            $isTop=1;
        }else{
            $isTop=0;
        }
        $res=Db::table('yiqi_community')->insert(
            [
                'user_id'=>$userInfo['Id'],
                'content'=>$data['communityContent'],
                'images'=>$data['images'],
                'video'=>$data['video'],
                'group_id'=>$data['group_id'],
                'address'=>$data['address'],
                'location'=>$data['location'],
                'isTop'=>$isTop
            ]);
        if($res) return true;
        throw new BaseException(['code'=>500,'msg'=>"发布异常，稍后再试",'errorCode'=>10000]);
    }
    //获取动态信息
    public function getCommunityInfo(){
        $data=request()->get();
        $userInfo=(new UserModel())->getUserInfo();
        $good=DB::table('yiqi_good')->field('count(community_id)')->where('community_id','c.Id')->buildSql();
        $show=DB::table('yiqi_community_show')->field('count(community_id)')->where('community_id','c.Id')->buildSql();
        $collection=DB::table('yiqi_collection')->field('count(community_id)')->where('community_id','c.Id')->buildSql();
        $comment=DB::table('yiqi_comment')->field('count(community_id)')->where('community_id','c.Id')->buildSql();
        //如果没有登录账号
        if(!$userInfo){
            $list=Db::table('yiqi_community')
                ->alias('c')
                ->join('yiqi_user u','c.user_id = u.Id')
                ->leftJoin('yiqi_community_group g','c.group_id = g.Id')
                ->leftJoin('yiqi_user_group ug','u.group = ug.Id')
                ->field('c.Id,c.content,c.address,c.location,c.images,c.video,c.create_time,u.username,u.nickname,u.Id as user_id,u.avatar,g.name as groupName,g.Id as groupId,ug.Id as userGroupId,ug.name as userGroupName,ug.type as userGroupType,'
                    .$good.' as good,'.$collection.' as collection,'.$comment.' as comment,'.$show.' as showNumber')
                ->group('c.Id')
                ->where('c.Id',$data['Id'])
                ->where('isRemove',0)
                ->find();
        }else{
            //是否关注
            $isFollow=DB::table('yiqi_follow')->field('count(follow_user_id)')->where('user_id',$userInfo['Id'])->where('follow_user_id','c.user_id')->buildSql();
            //是否点赞
            $isGood=DB::table('yiqi_good')->field('count(community_id)')->where('user_id',$userInfo['Id'])->where('community_id','c.Id')->buildSql();
            //是否收藏
            $isCollection=DB::table('yiqi_collection')->field('count(community_id)')->where('user_id',$userInfo['Id'])->where('community_id','c.Id')->buildSql();
            $list=Db::table('yiqi_community')
                ->alias('c')
                ->join('yiqi_user u','c.user_id = u.Id')
                ->leftJoin('yiqi_community_group g','c.group_id = g.Id')
                ->leftJoin('yiqi_user_group ug','u.group = ug.Id')
                ->field('c.Id,c.content,c.address,c.location,c.images,c.video,c.create_time,u.username,u.Id as user_id,u.nickname,u.avatar,g.name as groupName,g.Id as groupId,ug.Id as userGroupId,ug.name as userGroupName,ug.type as userGroupType,'
                    .$good.' as good,'.$collection.' as collection,'.$isFollow.' as isFollow,'.$comment.' as comment,'
                    .$isGood.' as isGood,'.$isCollection.' as isCollection,'.$show.' as showNumber')
                ->group('c.Id')
                ->where('c.Id',$data['Id'])
                ->where('isRemove',0)
                ->find();
        }
        return $list;
    }
    //获取我的关注
    public function getMyFollow(){
        $data=request()->get();
        $userInfo=(new UserModel())->getUserInfo();
        $good=DB::table('yiqi_good')->field('count(community_id)')->where('community_id','c.Id')->buildSql();
        $show=DB::table('yiqi_community_show')->field('count(community_id)')->where('community_id','c.Id')->buildSql();
        $collection=DB::table('yiqi_collection')->field('count(community_id)')->where('community_id','c.Id')->buildSql();
        $comment=DB::table('yiqi_comment')->field('count(community_id)')->where('community_id','c.Id')->buildSql();
        //是否关注
        $isFollow=DB::table('yiqi_follow')->field('count(follow_user_id)')->where('user_id',$userInfo['Id'])->where('follow_user_id','c.user_id')->buildSql();
        //是否点赞
        $isGood=DB::table('yiqi_good')->field('count(community_id)')->where('user_id',$userInfo['Id'])->where('community_id','c.Id')->buildSql();
        //是否收藏
        $isCollection=DB::table('yiqi_collection')->field('count(community_id)')->where('user_id',$userInfo['Id'])->where('community_id','c.Id')->buildSql();
        $list=Db::table('yiqi_community')
            ->alias('c')
            ->join('yiqi_user u','c.user_id = u.Id')
            ->leftJoin('yiqi_community_group g','c.group_id = g.Id')
            ->leftJoin('yiqi_follow f','f.follow_user_id=c.user_id')
            ->leftJoin('yiqi_user_group ug','u.group = ug.Id')
            ->field('c.Id,c.content,c.address,c.location,c.images,c.video,c.create_time,u.username,u.Id as user_id,u.nickname,u.avatar,g.name as groupName,g.Id as groupId,ug.Id as userGroupId,ug.name as userGroupName,ug.type as userGroupType,'
                .$good.' as good,'.$collection.' as collection,'.$isFollow.' as isFollow,'.$comment.' as comment,'
                .$isGood.' as isGood,'.$isCollection.' as isCollection,'.$show.' as showNumber')
            ->group('c.Id')
            ->where('f.user_id',$userInfo['Id'])
            ->where('isRemove',0)
            ->page($data['page'])
            ->order('create_time','desc')
            ->select();
        return $list;
    }
    //获取点赞评论最多的说说
    public function getCommunityFire(){
        $data=request()->get();
        $userInfo=(new User())->getUserInfo();
        $good=DB::table('yiqi_good')->field('count(community_id)')->where('community_id','c.Id')->buildSql();
        $show=DB::table('yiqi_community_show')->field('count(community_id)')->where('community_id','c.Id')->buildSql();
        $collection=DB::table('yiqi_collection')->field('count(community_id)')->where('community_id','c.Id')->buildSql();
        $comment=DB::table('yiqi_comment')->field('count(community_id)')->where('community_id','c.Id')->buildSql();
        //如果没有登录账号
        if(!$userInfo){
            $list=Db::table('yiqi_community')
                ->alias('c')
                ->join('yiqi_user u','c.user_id = u.Id')
                ->leftJoin('yiqi_community_group g','c.group_id = g.Id')
                ->leftJoin('yiqi_user_group ug','u.group = ug.Id')
                ->field('c.Id,c.content,c.address,c.location,c.images,c.video,c.create_time,u.username,u.nickname,u.Id as user_id,u.avatar,g.name as groupName,g.Id as groupId,ug.Id as userGroupId,ug.name as userGroupName,ug.type as userGroupType,'
                    .$good.' as good,'.$collection.' as collection,'.$comment.' as comment,'.$show.' as showNumber')
                ->group('c.Id')
                ->where('isRemove',0)
                ->page($data['page'])
                ->order('showNumber','desc')
                ->select();
        }else{
            //是否关注
            $isFollow=DB::table('yiqi_follow')->field('count(follow_user_id)')->where('user_id',$userInfo['Id'])->where('follow_user_id','c.user_id')->buildSql();
            //是否点赞
            $isGood=DB::table('yiqi_good')->field('count(community_id)')->where('user_id',$userInfo['Id'])->where('community_id','c.Id')->buildSql();
            //是否收藏
            $isCollection=DB::table('yiqi_collection')->field('count(community_id)')->where('user_id',$userInfo['Id'])->where('community_id','c.Id')->buildSql();
            $list=Db::table('yiqi_community')
                ->alias('c')
                ->join('yiqi_user u','c.user_id = u.Id')
                ->leftJoin('yiqi_community_group g','c.group_id = g.Id')
                ->leftJoin('yiqi_user_group ug','u.group = ug.Id')
                ->field('c.Id,c.content,c.address,c.location,c.images,c.video,c.create_time,u.username,u.Id as user_id,u.nickname,u.avatar,g.name as groupName,g.Id as groupId,ug.Id as userGroupId,ug.name as userGroupName,ug.type as userGroupType,'
                    .$good.' as good,'.$collection.' as collection,'.$isFollow.' as isFollow,'.$comment.' as comment,'
                    .$isGood.' as isGood,'.$isCollection.' as isCollection,'.$show.' as showNumber')
                ->group('c.Id')
                ->where('isRemove',0)
                ->page($data['page'])
                ->order('showNumber','desc')
                ->select();
        }
        return $list;
    }
    //删除动态
    public function removeCommunity(){
        $data=request()->get();
        $userInfo=(new UserModel())->getUserInfo();
        $res=Db::table('yiqi_community')->where('user_id',$userInfo['Id'])->where('Id',$data['Id'])->update(
            [
                'isRemove'=>1
            ]);
        if($res) return true;
        throw new BaseException(['code'=>500,'msg'=>"删除异常，稍后再试",'errorCode'=>10000]);
    }
    //获取用户动态
    public function getUserCommunity(){
        $data=request()->get();
        $userInfo=(new User())->getUserInfo();
        $good=DB::table('yiqi_good')->field('count(community_id)')->where('community_id','c.Id')->buildSql();
        $show=DB::table('yiqi_community_show')->field('count(community_id)')->where('community_id','c.Id')->buildSql();
        $collection=DB::table('yiqi_collection')->field('count(community_id)')->where('community_id','c.Id')->buildSql();
        $comment=DB::table('yiqi_comment')->field('count(community_id)')->where('community_id','c.Id')->buildSql();
        //如果没有登录账号
        if(!$userInfo){

            $list=Db::table('yiqi_community')
                ->alias('c')
                ->join('yiqi_user u','c.user_id = u.Id')
                ->leftJoin('yiqi_community_group g','c.group_id = g.Id')
                ->leftJoin('yiqi_user_group ug','u.group = ug.Id')
                ->field('c.Id,c.content,c.address,c.location,c.images,c.video,c.create_time,u.username,u.nickname,u.Id as user_id,u.avatar,g.name as groupName,g.Id as groupId,ug.Id as userGroupId,ug.name as userGroupName,ug.type as userGroupType,'
                    .$good.' as good,'.$collection.' as collection,'.$comment.' as comment,'.$show.' as showNumber')
                ->group('c.Id')
                ->page($data['page'])
                ->order('create_time','desc')
                ->where('isRemove',0)
                ->where('c.user_id',$data['Id'])
                ->select();

        }else{
            //是否关注
            $isFollow=DB::table('yiqi_follow')->field('count(follow_user_id)')->where('user_id',$userInfo['Id'])->where('follow_user_id','c.user_id')->buildSql();
            //是否点赞
            $isGood=DB::table('yiqi_good')->field('count(community_id)')->where('user_id',$userInfo['Id'])->where('community_id','c.Id')->buildSql();
            //是否收藏
            $isCollection=DB::table('yiqi_collection')->field('count(community_id)')->where('user_id',$userInfo['Id'])->where('community_id','c.Id')->buildSql();

            $list=Db::table('yiqi_community')
                ->alias('c')
                ->join('yiqi_user u','c.user_id = u.Id')
                ->leftJoin('yiqi_community_group g','c.group_id = g.Id')
                ->leftJoin('yiqi_user_group ug','u.group = ug.Id')
                ->field('c.Id,c.content,c.address,c.location,c.images,c.video,c.create_time,u.username,u.Id as user_id,u.nickname,u.avatar,g.name as groupName,g.Id as groupId,ug.Id as userGroupId,ug.name as userGroupName,ug.type as userGroupType,'
                    .$good.' as good,'.$collection.' as collection,'.$isFollow.' as isFollow,'.$comment.' as comment,'
                    .$isGood.' as isGood,'.$isCollection.' as isCollection,'.$show.' as showNumber')
                ->group('c.Id')
                ->where('isRemove',0)
                ->where('c.user_id',$data['Id'])
                ->page($data['page'])
                ->order('create_time','desc')
                ->select();


        }
        return $list;
    }
    public function getUserCommunityIndex(){
        $data=request()->get();
        //获取动态获赞总数
        $communityGood=Db::table('yiqi_good')->field('count(*) as good')->where('to_user_id',$data['Id'])->find();
        //一级评论点赞数
        $commentGood=Db::table('yiqi_comment_good')->field('count(*) as good')->where('to_user_id',$data['Id'])->find();
        //二级评论点赞数
        $commentTwoGood=Db::table('yiqi_comment_two_good')->field('count(*) as good')->where('to_user_id',$data['Id'])->find();
        $good=$communityGood['good']+$commentGood['good']+$commentTwoGood['good'];
        $myFollow=Db::table('yiqi_follow')->field('count(*) as myFollow')->where('user_id',$data['Id'])->find();
        $followMe=Db::table('yiqi_follow')->field('count(*) as followMe')->where('follow_user_id',$data['Id'])->find();
        $userInfo=(new UserModel())->getIdUserInfo($data['Id']);
        $res=[
            'userInfo'=>$userInfo,
            'good'=>$good,
            'myFollow'=>$myFollow['myFollow'],
            'followMe'=>$followMe['followMe']
        ];
        return $res;

    }
    //获取我的收藏
    public function myCollection(){
        $data=request()->get();
        $userInfo=(new User())->getUserInfo();
        $good=DB::table('yiqi_good')->field('count(community_id)')->where('community_id','c.Id')->buildSql();
        $show=DB::table('yiqi_community_show')->field('count(community_id)')->where('community_id','c.Id')->buildSql();
        $collection=DB::table('yiqi_collection')->field('count(community_id)')->where('community_id','c.Id')->buildSql();
        $comment=DB::table('yiqi_comment')->field('count(community_id)')->where('community_id','c.Id')->buildSql();

        //是否关注
        $isFollow=DB::table('yiqi_follow')->field('count(follow_user_id)')->where('user_id',$userInfo['Id'])->where('follow_user_id','c.user_id')->buildSql();
        //是否点赞
        $isGood=DB::table('yiqi_good')->field('count(community_id)')->where('user_id',$userInfo['Id'])->where('community_id','c.Id')->buildSql();
        //是否收藏
        $isCollection=DB::table('yiqi_collection')->field('count(community_id)')->where('user_id',$userInfo['Id'])->where('community_id','c.Id')->buildSql();

        $list=Db::table('yiqi_community')
            ->alias('c')
            ->join('yiqi_user u','c.user_id = u.Id')
            ->leftJoin('yiqi_community_group g','c.group_id = g.Id')
            ->rightJoin('yiqi_collection coll','c.Id = coll.community_id')
            ->leftJoin('yiqi_user_group ug','u.group = ug.Id')
            ->field('c.Id,c.content,c.address,c.location,c.images,c.video,c.create_time,u.username,u.Id as user_id,u.nickname,u.avatar,g.name as groupName,g.Id as groupId,ug.Id as userGroupId,ug.name as userGroupName,ug.type as userGroupType,'
                .$good.' as good,'.$collection.' as collection,'.$isFollow.' as isFollow,'.$comment.' as comment,'
                .$isGood.' as isGood,'.$isCollection.' as isCollection,'.$show.' as showNumber')
            ->group('c.Id')
            ->where('isRemove',0)
            ->where('coll.user_id',$userInfo['Id'])
            ->page($data['page'])
            ->order('create_time','desc')
            ->select();

        return $list;
    }
    //添加访客
    public function addVisitorNumber(){
        $data=request()->get();
        $res=Db::table('yiqi_community_show')->insert(['user_id'=>1,'community_id'=>$data['Id']]);
        if($res)return $res;
        throw new BaseException(['code'=>500,'msg'=>"请求异常，稍后再试",'errorCode'=>10000]);
    }
    public function getCommunityTop(){
        $good=DB::table('yiqi_good')->field('count(community_id)')->where('community_id','c.Id')->buildSql();
        $show=DB::table('yiqi_community_show')->field('count(community_id)')->where('community_id','c.Id')->buildSql();
        $collection=DB::table('yiqi_collection')->field('count(community_id)')->where('community_id','c.Id')->buildSql();
        $comment=DB::table('yiqi_comment')->field('count(community_id)')->where('community_id','c.Id')->buildSql();

        $list=Db::table('yiqi_community')
            ->alias('c')
            ->join('yiqi_user u','c.user_id = u.Id')
            ->leftJoin('yiqi_community_group g','c.group_id = g.Id')
            ->leftJoin('yiqi_user_group ug','u.group = ug.Id')
            ->field('c.Id,c.content,c.address,c.location,c.images,c.video,c.create_time,c.isTop,u.username,u.nickname,u.Id as user_id,u.avatar,g.name as groupName,g.Id as groupId,ug.Id as userGroupId,ug.name as userGroupName,ug.type as userGroupType,'
                .$good.' as good,'.$collection.' as collection,'.$comment.' as comment,'.$show.' as showNumber')
            ->group('c.Id')
            ->where('c.isTop',1)
            ->order('create_time','desc')
            ->where('isRemove',0)
            ->select();
        return $list;
    }
    //取消置顶
    public function closeTop(){
        $data=request()->get();
        $res=Db::table('yiqi_community')->where('Id',$data['Id'])->update(['isTop'=>0]);
        if($res)return $res;
        throw new BaseException(['code'=>500,'msg'=>"请求异常，稍后再试",'errorCode'=>10000]);
    }
    //搜索
    public function searchAll(){
        $data=request()->get();
        $userInfo=(new User())->getUserInfo();
        $good=DB::table('yiqi_good')->field('count(community_id)')->where('community_id','c.Id')->buildSql();
        $show=DB::table('yiqi_community_show')->field('count(community_id)')->where('community_id','c.Id')->buildSql();
        $collection=DB::table('yiqi_collection')->field('count(community_id)')->where('community_id','c.Id')->buildSql();
        $comment=DB::table('yiqi_comment')->field('count(community_id)')->where('community_id','c.Id')->buildSql();
        //如果没有登录账号
        if(!$userInfo){
                Db::table('yiqi_search')->insert(['title'=>$data['searchValue']]);
                $list=Db::table('yiqi_community')
                    ->alias('c')
                    ->join('yiqi_user u','c.user_id = u.Id')
                    ->leftJoin('yiqi_community_group g','c.group_id = g.Id')
                    ->leftJoin('yiqi_user_group ug','u.group = ug.Id')
                    ->field('c.Id,c.content,c.address,c.location,c.images,c.video,c.create_time,u.username,u.nickname,u.Id as user_id,u.avatar,g.name as groupName,g.Id as groupId,ug.Id as userGroupId,ug.name as userGroupName,ug.type as userGroupType,'
                        .$good.' as good,'.$collection.' as collection,'.$comment.' as comment,'.$show.' as showNumber')
                    ->group('c.Id')
                    ->page($data['page'])
                    ->order('create_time','desc')
                    ->where('isRemove',0)
                    ->whereLike('content','%'.$data['searchValue'].'%')
                    ->select();
        }else{
            Db::table('yiqi_search')->insert(['title'=>$data['searchValue'],'user_id'=>$userInfo['Id']]);
            //是否关注
            $isFollow=DB::table('yiqi_follow')->field('count(follow_user_id)')->where('user_id',$userInfo['Id'])->where('follow_user_id','c.user_id')->buildSql();
            //是否点赞
            $isGood=DB::table('yiqi_good')->field('count(community_id)')->where('user_id',$userInfo['Id'])->where('community_id','c.Id')->buildSql();
            //是否收藏
            $isCollection=DB::table('yiqi_collection')->field('count(community_id)')->where('user_id',$userInfo['Id'])->where('community_id','c.Id')->buildSql();
            $list=Db::table('yiqi_community')
                ->alias('c')
                ->join('yiqi_user u','c.user_id = u.Id')
                ->leftJoin('yiqi_community_group g','c.group_id = g.Id')
                ->leftJoin('yiqi_user_group ug','u.group = ug.Id')
                ->field('c.Id,c.content,c.address,c.location,c.images,c.video,c.create_time,u.username,u.Id as user_id,u.nickname,u.avatar,g.name as groupName,g.Id as groupId,ug.Id as userGroupId,ug.name as userGroupName,ug.type as userGroupType,'
                    .$good.' as good,'.$collection.' as collection,'.$isFollow.' as isFollow,'.$comment.' as comment,'
                    .$isGood.' as isGood,'.$isCollection.' as isCollection,'.$show.' as showNumber')
                ->group('c.Id')
                ->where('isRemove',0)
                ->page($data['page'])
                ->order('create_time','desc')
                ->whereLike('content','%'.$data['searchValue'].'%')
                ->select();
        }
        return $list;
    }
    public function getHotSearch(){
        $res = Db::table('yiqi_search')->field('title,count(*) as num')->group('title')->order('num','desc')->limit(0,5)->select();
        return $res;
    }
}
