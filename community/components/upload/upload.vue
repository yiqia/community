<template>
	<view>
		<view  @click="changeVideo" style="width: 200rpx;height: 200rpx;background-color: #f4f5f6;display: flex;justify-content: center;align-items: center;margin:10rpx;border-radius: 10rpx;position: relative;">
			<view style="" v-if="!isChange">
				<view style="display: flex;justify-content: center;">
					<u-icon name="plus" class="u-add-btn" size="40"></u-icon>
				</view>
				<view style="margin-top: 10rpx;">选择视频</view>
			</view>
			<video :src="video" v-if="isChange" style="width: 200rpx;height: 200rpx;border-radius: 10rpx;" :autoplay="true">
				<cover-view  @click.stop="closeVideo" v-if="isChange" style="position: absolute;top:10rpx;right:10rpx;width: 44rpx;height: 44rpx;background-color: #fa3534;border-radius: 50%;display: flex;justify-content: center;align-items: center;">
					<u-icon class="u-icon" name="close" size="20" color="#ffff"></u-icon>
				</cover-view>
			</video>
		</view>
	</view>
</template>

<script>
	import {Community} from "../../model/community";
	export default {
		data() {
			return {
				video:"",
				isChange:false
			};
		},
		methods:{
			async changeVideo(){
				var self = this;
				uni.chooseVideo({
					count: 1,
					sourceType: ['camera', 'album'],
					success: async function (res) {
						self.video = res.tempFilePath;
						self.isChange=true;
						uni.showLoading({
							title:"视频上传中"
						})
						var up = (await Community.uploadFile(res.tempFilePath)).data;
						uni.hideLoading();
						up=JSON.parse(up);
						if(up.code==200){
							uni.showToast({
								title:"上传成功"
							})
							self.$emit('uploadData',up.data);
						}else{
							uni.showToast({
								title:up.msg,
								icon:'none'
							})
						}
					}
				});
			},
			closeVideo(){
				var that = this;
				uni.showModal({
				    title: '提示',
				    content: '确定要删除该视频吗',
				    success: function (res) {
				        if (res.confirm) {
				          that.video="";
				          that.isChange=false;
				        } else if (res.cancel) {
				            console.log('用户点击取消');
				        }
				    }
				});
				
			}
		},
		props:{
		},
	}
</script>

<style lang="scss">

</style>
