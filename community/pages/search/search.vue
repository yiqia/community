<template>
	<view>
		<view style="width: 95%;margin: 10rpx auto;">
			<u-search placeholder="搜索" v-model="searchValue" @search="search" @custom="search" @change="change"></u-search>
		</view>
		<view v-show="communityList.length==0">
			<view style="color:#AAAAAA;margin: 30rpx 0 15rpx 0;" >
				<view class="Limit" style="display: flex;justify-content: space-between;">
					<view style="font-size: 25rpx;">
						最近搜索
					</view>
					<view>
						<u-icon name="trash" color="#AAAAAA" size="28" @click="remove"></u-icon>
					</view>
				</view>
			</view>
			<view class="Limit" style="margin: 30rpx;">
					<u-tag v-for="(item,index) in tagList" :key="index" :text="item.title"  :index="index"
					style="margin-right: 20rpx;margin-bottom:10rpx;padding: 15rpx 40rpx;" type="info" shape="circle" :show="item.isShow" @click="tagClick"/>
			</view>
		</view>
		<u-gap height="10" bg-color="#f5f5f5"></u-gap>
		<view v-show="searchValue.length<1">
			<view style="color:#AAAAAA;margin: 30rpx 0 15rpx 0;">
				<view class="Limit" style="display: flex;justify-content: space-between;">
					<view style="font-size: 25rpx;">
						热门搜索
					</view>
				</view>
			</view>
			<view class="Limit">
				<u-row gutter="16">
					<u-col span="6" v-for="(item,index) in hotList" :key="index">
						<view @click="tagHot" :data-index="index" class="tag-hot">{{item.title}}</view>
					</u-col>
					
				</u-row>
			</view>
		</view>
		<view>
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
		</view>
		
	</view>
</template>

<script>
	import {Community} from "../../model/community";
	import communityCard from '../../components/community-card/index.vue';
	export default {
		data() {
			return {
				searchValue:"",
				communityList:[],
				communityObject:"",
				tagList:[],
				hotList:[],
			};
		},
		onLoad() {
			this.tagList=uni.getStorageSync('searchOld');
			this.getSearchHot();
		},
		methods:{
			remove(){
				uni.clearStorageSync('searchOld')
				this.tagList=[]
			},
			tagClick(e){
				this.searchValue=this.tagList[e].title;
				this.search(this.tagList[e].title)
			},
			tagHot(e){
				let index = e.target.dataset.index;
				this.searchValue=this.hotList[index].title;
			},
			change(e){
				if(e==""){
					this.communityList=[];
					this.communityObject="";
				}
			},
			async getSearchHot(){
				var res = await Community.getSearchHot();
				this.hotList=res.data;
			},
			async search(e){
				let searchOld=uni.getStorageSync('searchOld');
				if(searchOld&& typeof searchOld=='object'){
					searchOld.unshift({title:e,isShow:true})
					
					uni.setStorageSync('searchOld',searchOld);
				}else{
					let s =[{title:e,isShow:true}];
					uni.setStorageSync('searchOld',s);
				}
				var paging = await Community.searchAll(e);
				var data = await paging.getMoreData();
				if(!data.moreData){
					this.status="nomore";
				};
				const resData=Community.makeImages(data.items);
				this.communityList=resData;
				this.communityObject=paging;
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
			//H5点击回复
			clickH5comment(e){
				uni.navigateTo({
					url:"../community/index?Id="+e
				})
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
			//关注
			async clickFollow(e){
				uni.showLoading({
					title:"请求中"
				})
				const res= await Community.sendFollow(e.Id);
				uni.hideLoading();
				var that = this;
				this?.communityList.forEach((item,index)=>{
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
		},
		components:{
			communityCard
		}
	}
</script>

<style lang="scss">
	.tag-hot{
		padding: 10rpx 15rpx;
	}
</style>
