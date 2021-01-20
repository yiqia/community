<template>
	<view>
		<view class="u-page" style="height: 93vh;">
			
			<view style="width: 95%;margin: 0 auto;">
				<u-search placeholder="点我搜索" :disabled="true" :show-action="false" @click="tapSearch"></u-search>
			</view>
			<u-tabs :list="list" active-color="#5466ff" :is-scroll="true" :current="swiperCurrent" @change="change"></u-tabs>
			<block v-for="(i,j) in communityList" :key="j">
				<community-card
						@tapComment="tapComment"
						:info="i" :isIndex="j"
						@clickGood="clickGood"
						@clickCollection="clickCollection"
						@clickFollow="clickFollow"
						@clickH5comment="clickH5comment"
						@changeMoreSelect="changeMoreSelect"
				></community-card>
			</block>
			<community-comment 
				:show="showComment"
				:info="commentList"
				@close="closeComment"
				@sendComment="sendComment"
				@tapGood="tapGood"
				@tapGoodTwo="tapGoodTwo"
			></community-comment>
			<view style="width: 100%;height: 10vh;margin-top: 20rpx;">
				<u-loadmore :status="status"/>
			</view>
			<view style="width: 100%;height: 10vh">
				
			</view>
		</view>
		<!-- <u-tabbar active-color="#5466ff" v-model="current" :list="tabbar"  :mid-button="true" height="7vh"></u-tabbar>	 -->
		<tabbar  :current='current' :show="show" @changeShow="changeShow"></tabbar>
	</view>
</template>

<script>
// 一奇开源 QQ330729121
import communityCard from '../../components/community-card/index.vue';
import communityComment from '../../components/community-comment/index.vue';
import tabbar from "../../components/tabbar/tabbar"
//import tabbar from "../../common/tabbar.js"
import {Community} from "../../model/community";
import {getTime} from "../../utils/public.js";
export default {
	data() {
		return {
			current:0,
			tabsCurrent:1,
			swiperCurrent:0,
			// tabbar:tabbar,
			communityList:[],
			commentList:[],
			status:"loading",
			list: [
				{
					name: '关注',
				},
				{
					name: '最新'
				},
				{
					name: '最热'
				}
			],
			show:false,
			showComment: false,
			commentCode:{
				
			},
			communityObject:""
		};
	},
	components: {
		communityCard,
		communityComment,
	    tabbar
	},
	mounted() {
		
	},
	async onLoad(){
		await this.initGroup();
		this.initList();
	},
	async onReachBottom(){
		if(this.communityObject=="")return ;
		var paging =await this.communityObject;
		console.log(paging.moreData==true)
		if(paging.moreData){
			var data = await paging.getMoreData();
			const resData=Community.makeImages(data.items);
			this.communityList=this.communityList.concat(resData);
			if(!data.moreData){
				this.status="nomore";
			}
		}else{
			this.status="nomore";
		}
		console.log(this.status)
	},
	async onPullDownRefresh(){
		await this.initList();
		uni.showToast({
			title:"刷新完成",
			icon:'none'
		})
		uni.stopPullDownRefresh();
	},
	methods: {
		tapSearch(e){
			console.log(123)
			uni.navigateTo({
				url:"../search/search"
			})
		},
		changeShow(e){
			console.log(e)
			this.show=true;
		},
		//选择了更多
		async changeMoreSelect(e){
			//举报
			if(e.value==1){
				var ress = await Community.sendReport(e.Id);
			//删除	
			}else if(e.value==2){
				var that = this;
				await new Promise((res,rs)=>{
					uni.showModal({
					    title: '提示',
					    content: '确定要删除吗',
					    success: async function (res) {
					        if (res.confirm) {
					           var ress = await Community.removeCommunity(e.Id);
					           that.communityList.splice(e.index, 1); 
					        } else if (res.cancel) {
					            console.log('用户点击取消');
					        }
					    }
					});
				})
			}else if(e.value==3){
				var ress = await Community.closeTop(e.Id);
			}
			if(ress.code==200){
				uni.showToast({
					title:ress.msg
				})
			}else{
				uni.showToast({
					title:ress.msg,
					icon:'none'
				})
			}
		},
		//H5点击回复
		clickH5comment(e){
			uni.navigateTo({
				url:"../community/index?Id="+e
			})
		},
		//初始化数据
		async initList(group='',index=1){
			this.swiperCurrent=index;
			//初始化最新首页数据
			if(group==''){
				var paging = await Community.getContent();
			}else{
				var paging = await Community.getContent(group);
			}
			var top = await Community.getCommunityTop();
			var data = await paging.getMoreData();
			if(!data.moreData){
				this.status="nomore";
			};
			const resData=Community.makeImages(data.items,false);
			if(top.data.length>0){
				var resTop=Community.makeImages(top.data,false);
				this.communityList=resTop.concat(resData);
			}else{
				this.communityList=resData;
			}
			
			this.communityObject=paging;
			
			
			
		},
		//初始化圈子类别
		async initGroup(){
			var quanzi = await Community.getCommunityGroup();
			quanzi.data.shift();
			this.list=this.list.concat(quanzi.data)
		},
		//二级评论点赞
		async tapGoodTwo(e){
			var res = await Community.sendCommentTwoGood(e.Id);
			if(res){
				this.commentList[e.index].twoComment[e.indexTwo].isGood=!e.isGood;
				this.commentList[e.index].twoComment[e.indexTwo].isGood==1?this.commentList[e.index].twoComment[e.indexTwo].good+=1:this.commentList[e.index].twoComment[e.indexTwo].good-=1;
			}
		},
		//评论点赞
		async tapGood(e){
			var res = await Community.sendCommentGood(e.Id);
			if(res){
				this.commentList[e.index].isGood=!e.isGood;
				this.commentList[e.index].isGood==1?this.commentList[e.index].good+=1:this.commentList[e.index].good-=1;
			}
		},
		//评论
		async sendComment(e){
			const res = await Community.senComment({'community_id':this.commentCode.Id,'comment_user_id':e.Id,'content':e.content});
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
					this.commentList[e.index]['twoComment'].unshift(comment);
				}else{
					this.commentList.unshift(comment);
				}
				
				
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
			this.communityList.forEach((item,index)=>{
				if(item.user_id==e.Id){
					that.communityList[index].isFollow=!e.isFollow;
				}
			})
		},
		//点赞
		async clickGood(e){
			this.communityList[e.isIndex].isGood=!e.isGood;
			e.isGood==0?this.communityList[e.isIndex].good+=1:this.communityList[e.isIndex].good-=1;
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
				this.communityList[e.isIndex].isGood=!this.communityList[e.isIndex].isGood;
				e.isGood==0?this.communityList[e.isIndex].good-=1:this.communityList[e.isIndex].good+=1;
			}
		},
		//收藏
		async clickCollection(e){
			this.communityList[e.isIndex].isCollection=!e.isCollection;
			e.isCollection==0?this.communityList[e.isIndex].collection+=1:this.communityList[e.isIndex].collection-=1;
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
				e.isCollection==0?this.communityList[e.isIndex].collection-=1:this.communityList[e.isIndex].collection+=1;
			}
		},
		async tapComment(e) {
			this.commentCode=e;
			this.showComment = true;
			const res= await Community.getComment(e.Id);
			this.commentList=res.accoumulator;
		},
		closeComment(e) {
			this.showComment = false;
		},
		//获取我的关注
		async getMyFollow(){
			if(uni.getStorageSync('userInfo')==undefined || uni.getStorageSync('userInfo')==''){
				uni.showToast({
					title:"请先登录",
					icon:"none"
				})
				return ;
			}
			this.swiperCurrent = 0;
			var paging = await Community.getMyFollow();
			const moreData = await paging.getMoreData();
			const data=Community.makeImages(moreData.items);
			if(!data.moreData){
				this.status="nomore";
			};
			this.communityList=data;
			this.communityObject=paging;
			
		},
		//获取最热
		async getCommunityFire(){
			this.swiperCurrent = 2;
			var paging = await Community.getCommunityFire();
			const moreData = await paging.getMoreData();
			const data=Community.makeImages(moreData.items);
			this.communityList=data;
			this.communityObject=paging;
			
			console.log(data);
		},
		// tab栏切换
		change(index) {
	
			if(index==0){
				this.getMyFollow();
			}else if(index==1){
				this.initList()
			}else if(index==2){
				this.getCommunityFire();
			}else{
				this.initList(this.list[index].Id,index);
				this.swiperCurrent=index;
			}
		},
		changeTab(index){
			this.current=index;
			uni.reLaunch({
				url:this.tabbar[index].path
			})
		},
	}
};
</script>

<style lang="scss">
	// .swiper-box {
	// 	flex: 1;
	// 	height: calc(100vh - 50rpx - 80rpx - 100rpx - var(--window-top));
	// }
	.swiper-item {
		height: 100%;
	}
</style>
