<template>
	<view>
		<u-tabbar active-color="#5466ff" v-model="current" :list="tabbar" :beforeSwitch="beforeSwitch" :mid-button="true" @change="changeTab" height="7vh"></u-tabbar>
		<u-popup v-model="show" mode="top" height="400" :closeable="true" close-icon-pos="bottom-right">
			<view style="display: flex;align-items: center;height:400rpx;">
				<view style="width: 100%;height: 250rpx;display: flex;align-items: center;">
					<view style="width:50%;display: flex;justify-content: center;flex-direction: column;text-align: center;" hover-class="small-hover" hover-stay-time="300" @click="goUrl" data-id="0">
						<image style="width: 110rpx;height: 110rpx;margin: 0 auto;" src="../../static/images/image_3.png" mode=""></image>
						<view style="color: #616161;margin-top: 13rpx;">发布图片动态</view>
					</view>
					<view style="width:50%;display: flex;justify-content: center;flex-direction: column;text-align: center;" hover-class="small-hover" hover-stay-time="300"  @click="goUrl" data-id="1">
						<image style="width: 100rpx;height: 100rpx;margin: 0 auto;" src="../../static/images/video.png" mode=""></image>
						<view style="color: #616161;margin-top: 20rpx;">发布视频动态</view>
					</view>
				</view>
			</view>
		</u-popup>
	</view>
	
</template>

<script>
export default {
	data() {
		return {
			value: 0,
			show:false,
			tabbar: [
				{
					iconPath: 'home',
					selectedIconPath: 'home-fill',
					text: '首页',
					count: 0,
					isDot: false,
					customIcon: false,
					path: '/pages/home/index'
				},
				// {
				// 	iconPath: 'photo',
				// 	selectedIconPath: 'photo-fill',
				// 	text: '放映厅',
				// 	customIcon: false,
				// 	path: '/pages/home/index'
				// },
				{
					iconPath: '/static/images/send.png',
					selectedIconPath: '/static/images/send.png',
					text: '发布',
					midButton: true,
					customIcon: false,
					path: '/pages/send/send'
				},
				// {
				// 	iconPath: 'play-right',
				// 	selectedIconPath: 'play-right-fill',
				// 	text: '直播',
				// 	customIcon: false,
				// 	path: '/pages/home/index'
				// },
				{
					iconPath: 'account',
					selectedIconPath: 'account-fill',
					text: '我的',
					count: 0,
					isDot: false,
					customIcon: false,
					path: '/pages/my/my'
				}
			]
		};
	},
	props: ['current'],
	watch: {
	},
	methods: {
		changeTab(index) {
			uni.reLaunch({
				url: this.tabbar[index].path
			});
		},
		beforeSwitch(index) {
			if(index==1){
				this.show=!this.show;
				return false;
			}
			return true;
		},
		goUrl(e){
			var id=e.currentTarget.dataset.id;
			if(id==0){
				uni.navigateTo({
					url:"../../pages/send/send?type=image"
				})
			}else{
				uni.navigateTo({
					url:"../../pages/send/send?type=video"
				})
			}
		}
	}
};
</script>

<style>
	
</style>
