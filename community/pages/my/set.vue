<template>
	<view>
		<u-popup v-model="show" mode="top" height="500" close-icon-pos="bottom-right" :closeable="true">
			<view class="flexCenter" style="width: 90%;height: 500rpx;margin: 0 auto;flex-direction: column;">
				<view style="width: 100%;margin: 10rpx 0;">
					<u-input v-model="form.oldPassword" :type="type" :border="border"  placeholder="输入原密码" />
				</view>
				<view style="width: 100%;margin: 10rpx 0;">
					<u-input v-model="form.newPassword" :type="type" :border="border"  placeholder="输入新密码" />
				</view>
				<view style="width: 100%;margin: 10rpx 0 30rpx 0;">
					<u-input v-model="form.rePassword" :type="type" :border="border"  placeholder="确认新密码" />
				</view>
				<u-button type="primary" @click="changePassword">确认修改</u-button>
			</view>
		</u-popup>
		<u-cell-group>
			<u-cell-item  title="修改密码" :arrow="false" arrow-direction="down" @click="clickCell(1)">
				<view slot="right-icon" style="display: flex;">
					
					<u-icon name="arrow-right" color="#c5c5c5"></u-icon>
				</view>
			</u-cell-item>
			<u-cell-item  title="帮助与反馈" :arrow="false"  @click="clickCell(2)">
				<view slot="right-icon" style="display: flex;">
					<u-icon name="arrow-right" color="#c5c5c5"></u-icon>
				</view>
			</u-cell-item>
			<u-cell-item  title="关于我们" :arrow="false"   @click="clickCell(3)">
				<view slot="right-icon" style="display: flex;">
					<u-icon name="arrow-right" color="#c5c5c5"></u-icon>
				</view>
			</u-cell-item>
		</u-cell-group>
	</view>
</template>

<script>
	import {User} from "../../model/user.js";
	export default {
		data() {
			return {
				src:"http://pic2.sc.chinaz.com/Files/pic/pic9/202002/hpic2119_s.jpg",
				show: false,
				value: '',
				type: 'password',
				border: true,
				form:{
					oldPassword:"",
					newPassword:"",
					rePassword:""
				}
			};
		},
		created() {
			this.userInfo=uni.getStorageSync('userInfo');
			this.value=this.userInfo.nickname;
		},
		onLoad() {
	
		},
		methods:{
			async changePassword(){
				if(this.form.oldPassword=='' || this.form.newPassword=='' || this.form.rePassword==''){
					uni.showToast({
						title:"不能为空",
						icon:"none"
					})
					return ;
				}
				if(this.form.newPassword!==this.form.rePassword){
					uni.showToast({
						title:"两次密码不一致",
						icon:"none"
					})
					return ;
				}
				var res = await User.changePassword(this.form);
				console.log(res);
				if(res.code==200){
					uni.showToast({
						title:res.msg
					})
					this.show=false;
				}else{
					uni.showToast({
						title:res.msg,
						icon:"none"
					})
				}
			},
			clickCell(e){
				if(e==1){
					this.show=true;
				}else if(e==2){
					uni.navigateTo({
						url:'/pages/send/feedback'
					})
				}else if(e==3){
					uni.navigateTo({
						url:'/pages/about/about'
					})
				}
				
			},
			//更换头像
			changeHeader(){
				var self = this;
				uni.chooseImage({
				    count: 1, //默认9
				    sizeType: ['original', 'compressed'], //可以指定是原图还是压缩图，默认二者都有
				    sourceType: ['album'], //从相册选择
				    success: async function (res) {
				    	self.images = res.tempFilePaths[0];
				    	self.isChange=true;
				    	uni.showLoading({
				    		title:"图片上传中"
				    	})
				    	var up = (await User.uploadHeader(res.tempFilePaths[0])).data;
				    	uni.hideLoading();
				    	up=JSON.parse(up);
				    	if(up.code==200){
				    		uni.showToast({
				    			title:"上传成功"
				    		})
							self.userInfo.avatar=User.compressImage(up.data);
							
							uni.setStorageSync('userInfo',self.userInfo);
							self.$forceUpdate();
				    	}else{
				    		uni.showToast({
				    			title:up.msg,
				    			icon:'none'
				    		})
				    	}
				    }
				});
			}
		}
	}
</script>

<style lang="scss">

</style>
