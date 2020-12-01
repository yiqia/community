<template>
	<view>
		<u-skeleton :loading="loading" :animation="true" bgColor="#FFF"></u-skeleton>
		<view class="header u-skeleton">
			<view class="myLimit" style="display: flex;">
				<view style="width: 30%;display: flex;align-items: center;justify-content: center;" @click="goInfo">
					<u-avatar
						class="u-skeleton-circle"
						:src="userIndex != '' && userIndex.userInfo['avatar'] ? userIndex.userInfo['avatar'] : ''"
						mode="square"
						size="120"
					></u-avatar>
				</view>
				<view class="headerInfoRight flexCenter">
					<view style="width: 100%;height: 120rpx;">
						<view style="height:50%;width: 100%;display: flex;align-items: center;padding-left: 20rpx;">
							<text style="font-size: 40rpx;font-weight: bold;" class="u-skeleton-rect">
								{{ userIndex != '' && userIndex.userInfo['nickname'] ? userIndex.userInfo['nickname'] : '暂未设置用户名' }}
							</text>
						</view>
						<view style="padding-left: 20rpx;color: #bcc5d2;">
							<text style="font-size: 30rpx;" class="u-skeleton-rect">账号：{{ userIndex != '' && userIndex.userInfo['username'] }}</text>
						</view>
					</view>
				</view>
			</view>
		</view>
		<!-- 获赞数等 -->
		<view class="myLimit" style="width: 100%;margin-bottom: 50rpx;">
			<u-row gutter="16">
				<u-col span="4">
					<view class="flexCenter">
						<view style="display: flex;flex-direction: column;">
							<text style="font-size: 40rpx;color: #f85063;display: block;font-weight: 600;">{{ userIndex.good }}</text>
							<text style="font-size: 20rpx;color: #bcc5d2;text-align: center;">获赞</text>
						</view>
					</view>
				</u-col>
				<u-col span="4">
					<view class="flexCenter">
						<view style="display: flex;flex-direction: column;">
							<text style="font-size: 40rpx;color: #5466ff;display: block;font-weight: 600;">{{ userIndex.myFollow }}</text>
							<text style="font-size: 20rpx;color: #bcc5d2;text-align: center;">关注</text>
						</view>
					</view>
				</u-col>
				<u-col span="4">
					<view class="flexCenter">
						<view style="display: flex;flex-direction: column;">
							<text style="font-size: 40rpx;color: #ffca12;display: block;font-weight: 600;">{{ userIndex.followMe }}</text>
							<text style="font-size: 20rpx;color: #bcc5d2;text-align: center;">粉丝</text>
						</view>
					</view>
				</u-col>
			</u-row>
		</view>
		<view style="width: 660rpx;height: 2rpx;background-color: #f7f8ff;margin: 20rpx auto;"></view>
	</view>
</template>

<script>
	import { Community } from '../../model/community';
	import { User } from '../../model/user.js';
	export default {
		data() {
			return {
				userIndex:"",
				loading:true
			};
		},
		props:['Id','isGo'],
		async mounted() {
			if(!this.Id)return ;
			var user = await Community.getUserCommunityIndex(this.Id);
			
			if (user.code == 200) {
				this.userIndex = user.data;
				this.loading=false;
				if(this.userIndex){
					this.userIndex.userInfo.avatar=User.compressImage(this.userIndex.userInfo.avatar);
					
				}
				
			}
		},
		methods:{
			goInfo(){
				if(this.isGo){
					uni.navigateTo({
						url:"./info"
					})
				}else{
					uni.previewImage({
						urls:[this.userIndex.userInfo.avatar],
						current:0
					})
				}
			},
		},
		async onLoad() {
			
			
		
		}
	}
</script>

<style lang="scss">
.header{
		width: 100%;
		height: 200rpx;
		margin-bottom: 20rpx;
	}
	.myLimit{
		height: 100%;
		width: 660rpx;
		margin: 0 auto;
	}
</style>
