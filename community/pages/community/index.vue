<template>
	<div name="">
		<community-card 
			:info="info"
			@tapComment="tapComment"
			@clickGood="clickGood"
			@clickCollection="clickCollection"
			@clickFollow="clickFollow"
			@changeMoreSelect="changeMoreSelect"
		></community-card>
		<communityInfo-comment 
			:info="comment"
			@sendComment="sendComment"
			@tapGood="tapGood"
			@tapGoodTwo="tapGoodTwo"
		></communityInfo-comment>
		<view style="width: 100%;height: 10vh;margin-top: 20rpx;">
			<u-loadmore :status="status"/>
		</view>
		<view style="width: 100%;height: 10vh;">
			
		</view>
	</div>
</template>

<script>
	// 一奇开源 QQ330729121
	import communityCard from '../../components/community-card/index.vue';
	import communityInfoComment from '../../components/communityInfo-comment/communityInfo-comment.vue';
	import {Community} from "../../model/community";
	import {getTime} from "../../utils/public.js";
	export default{
		name:"",
		data(){
			return {
				info:"",
				comment:"",
				paging:"",
				status:"loading",
				Id:"",
			}
		},
		methods:{
			
		},
		async onLoad(e){
			var res = await Community.getCommunityInfo(e.Id);
		
			if(res.code==200) this.info=res.data;
			var paging = await Community.getCommunityComment(e.Id);
			var data = await paging.getMoreData();
			const resData=Community.makeImages(data.items);
			this.comment=resData;
			this.paging=paging;
			if(!paging.moreData){
				this.status="nomore";
			}
			if(paging.accoumulator.length<20){
				this.status="nomore";
			}
			this.Id=e.Id;
		},
		async onReachBottom(){
			if(this.paging=="")return ;
			var paging = this.paging;
			if(paging.moreData){
				var data = await paging.getMoreData();
				const resData=Community.makeImages(data.items);
				this.comment=this.comment.concat(resData);
				this.status="nomore";
			}else{
				this.status = 'nomore';
			}
			
		},
		async onPullDownRefresh(){
			var paging = await Community.getCommunityComment(this.Id);
			var data = await paging.getMoreData();
			const resData=Community.makeImages(data.items);
			this.comment=resData;
			this.paging=paging;
			if(!paging.moreData){
				this.status="nomore";
			}
			uni.showToast({
				title:"刷新完成",
				icon:'none'
			})
			uni.stopPullDownRefresh();
		},
		mounted(){
			
		},
		methods:{
			//二级评论点赞
			async tapGoodTwo(e){
				var res = await Community.sendCommentTwoGood(e.Id);
				if(res){
					this.comment[e.index].twoComment[e.indexTwo].isGood=!e.isGood;
					this.comment[e.index].twoComment[e.indexTwo].isGood==1?this.comment[e.index].twoComment[e.indexTwo].good+=1:this.comment[e.index].twoComment[e.indexTwo].good-=1;
				}
			},
			//评论点赞
			async tapGood(e){
				var res = await Community.sendCommentGood(e.Id);
				if(res){
					this.comment[e.index].isGood=!e.isGood;
					this.comment[e.index].isGood==1?this.comment[e.index].good+=1:this.comment[e.index].good-=1;
				}
			},
			//评论
			async sendComment(e){
				const res = await Community.senComment({'community_id':this.info.Id,'comment_user_id':e.Id,'content':e.content});
				if(res){
					uni.showToast({
						title:"评论成功"
					})
					uni.$emit('commentOk',{
						code:true
					});
					const userInfo=uni.getStorageSync('userInfo');
					let comment={
						Id: res.data.Id,
						avatar: userInfo.avatar,
						content: e.content,
						create_time:getTime(),
						good: 0,
						isGood: 0,
						nickname: userInfo.nickname,
						sign: userInfo.sign,
						twoComment: [],
						user_id: userInfo.Id,
						username: userInfo.username
					}
					if(e.Id){
						this.comment[e.index]['twoComment'].unshift(comment);
					}else{
						this.comment.unshift(comment);
						this.info.comment+=1;
					}
					
					
					
				}
			},
			async changeMoreSelect(e){
				var res = await Community.sendReport(e.Id);
				if(res.code==200){
					uni.showToast({
						title:"举报成功",
					})
				}else{
					uni.showToast({
						title:res.msg,
						icon:"none"
					})
				}
				
			},
			//关注
			async clickFollow(e){
				uni.showLoading({
					title:"请求中"
				})
				const res= await Community.sendFollow(e.Id);
				uni.hideLoading();
				var that = this;
				this.info.isFollow=!e.isFollow;
			},
			//点赞
			async clickGood(e){
				this.info.isGood=!e.isGood;
				e.isGood==0?this.info.good+=1:this.info.good-=1;
				const res= await Community.sendGood(e.Id);
				if(res){
					//#ifdef MP-WEIXIN
					uni.vibrateShort({
						success: function () {
							console.log('抖动');
						}
					});
					//#endif
				}else{
					this.info.isGood=!this.info.isGood;
					e.isGood==0?this.info.good-=1:this.info.good+=1;
				}
			},
			//收藏
			async clickCollection(e){
				this.info.isCollection=!e.isCollection;
				e.isCollection==0?this.info.collection+=1:this.info.collection-=1;
				const res= await Community.sendCollection(e.Id);
				if(res){
					//#ifdef APP-PLUS||MP-WEIXIN
					uni.vibrateShort({
						success: function () {
							console.log('抖动');
						}
					});
					//#endif
				}else{
					e.isCollection==0?this.info.collection-=1:this.info.collection+=1;
				}
			},
		},
		components: {
			communityCard,
			communityInfoComment
		},
		
	}
</script>

<style lang="scss" scoped>
	
</style>
