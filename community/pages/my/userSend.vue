<template>
	<view>
		<user-header :Id="userId"></user-header>
		<block v-for="(i, j) in communityList" :key="j">
			<community-card
				@tapComment="tapComment"
				:info="i"
				:isIndex="j"
				:noHeaderGo="true"
				@clickGood="clickGood"
				@clickCollection="clickCollection"
				@clickFollow="clickFollow"
				@clickH5comment="clickH5comment"
				@changeMoreSelect="changeMoreSelect"
			></community-card>
		</block>
		<view style="width: 100%;height: 10vh;margin-top: 20rpx;"><u-loadmore :status="status" /></view>
	</view>
</template>

<script>
import communityCard from '../../components/community-card/index.vue';
import { Community } from '../../model/community';
export default {
	data() {
		return {
			status: 'loading',
			communityList: [],
			communityObject: '',
			userId: '',
			userIndex: '',
			loading: true // 是否显示骨架屏组件
		};
	},
	components: {
		communityCard
	},
	onLoad(option) {
		if (uni.getStorageSync('token') && uni.getStorageSync('userInfo')) {
			this.isLogin = true;
			this.userInfo = uni.getStorageSync('userInfo');
		}
		option.type?option.type:option.type='send';
		if (option.Id) {
			this.userId = option.Id;
			this.initList(option.Id,option.type);
		} else {
			this.userId = this.userInfo.Id;
			this.initList(this.userInfo.Id,option.type);
		}
	},
	methods: {
		async initList(Id,type) {
			if(type=='collection'){
				var paging = await Community.myCollection();
				
			}else{
				var paging = await Community.getUserCommunity(Id);
			}
			var res = await paging.getMoreData();
			
			if (!res.moreData) {
				this.status = 'nomore';
			}
			const resData = Community.makeImages(res.items);
			this.communityList = resData;
			this.communityObject = paging;
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
		//H5点击回复
		clickH5comment(e){
			uni.navigateTo({
				url:"../community/index?Id="+e
			})
		},
		//关注
		async clickFollow(e) {
			uni.showLoading({
				title: '请求中'
			});
			const res = await Community.sendFollow(e.Id);
			uni.hideLoading();
			var that = this;
			this.communityList.forEach((item, index) => {
				if (item.user_id == e.Id) {
					that.communityList[index].isFollow = !e.isFollow;
				}
			});
		},
		//点赞
		async clickGood(e) {
			this.communityList[e.isIndex].isGood = !e.isGood;
			e.isGood == 0 ? (this.communityList[e.isIndex].good += 1) : (this.communityList[e.isIndex].good -= 1);
			const res = await Community.sendGood(e.Id);
			if (res) {
				//#ifdef MP-WEIXIN
				uni.vibrateShort({
					success: function() {
						console.log('抖动');
					}
				});
				//#endif
			} else {
				this.communityList[e.isIndex].isGood = !this.communityList[e.isIndex].isGood;
				e.isGood == 0 ? (this.communityList[e.isIndex].good -= 1) : (this.communityList[e.isIndex].good += 1);
			}
		},
		//收藏
		async clickCollection(e) {
			this.communityList[e.isIndex].isCollection = !e.isCollection;
			e.isCollection == 0 ? (this.communityList[e.isIndex].collection += 1) : (this.communityList[e.isIndex].collection -= 1);
			const res = await Community.sendCollection(e.Id);
			if (res) {
				//#ifdef APP-PLUS||MP-WEIXIN
				uni.vibrateShort({
					success: function() {
						console.log('抖动');
					}
				});
				//#endif
			} else {
				e.isCollection == 0 ? (this.communityList[e.isIndex].collection -= 1) : (this.communityList[e.isIndex].collection += 1);
			}
		}
	},
	async onReachBottom() {
		if (this.communityObject == '') return;
		var paging = await this.communityObject;
		if (paging.moreData) {
			var data = await paging.getMoreData();
			const resData = Community.makeImages(data.items);
			this.communityList = this.communityList.concat(resData);
			if (!data.moreData) {
				this.status = 'nomore';
			}
		} else {
			this.status = 'nomore';
		}
	},
	async onPullDownRefresh() {
		await this.initList(this.userId);
		uni.showToast({
			title: '刷新完成',
			icon: 'none'
		});
		uni.stopPullDownRefresh();
	}
};
</script>

<style lang="scss">
.header {
	width: 100%;
	height: 200rpx;
	margin-bottom: 20rpx;
}
.myLimit {
	height: 100%;
	width: 660rpx;
	margin: 0 auto;
}
.closeLogin {
	width: 100%;
	height: 100rpx;
	display: flex;
	justify-content: center;
	align-items: center;
	background-color: #fff;
	box-shadow: 4rpx 5rpx 30rpx #eeeff9;
}
</style>
