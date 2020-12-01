<template>
	<view>
		<u-popup v-model="show" mode="top" height="500" close-icon-pos="bottom-right" :closeable="true">
			<view class="flexCenter" style="width: 90%;height: 400rpx;margin: 0 auto;flex-direction: column;">
				<view style="width: 100%;margin: 50rpx 0;">
					<u-input v-model="value" :type="type" :border="border"  placeholder="输入名称" />
				</view>
				<u-button type="primary" @click="changeName">确认修改</u-button>
			</view>
		</u-popup>
		<u-cell-group>
			<u-cell-item  title="头像" :arrow="false" arrow-direction="down" @click="changeHeader">
				<view slot="right-icon" style="display: flex;">
					<u-avatar :src="userInfo.avatar"   mode="square" size="70" style="margin-right: 10rpx;"></u-avatar>
					<u-icon name="arrow-right" color="#c5c5c5"></u-icon>
				</view>
			</u-cell-item>
			<u-cell-item  title="昵称" :arrow="false"  @click="clickCell(2)" >
				<view slot="right-icon" style="display: flex;">
					<text>{{userInfo.nickname}}</text>
					<u-icon name="arrow-right" color="#c5c5c5"></u-icon>
				</view>
			</u-cell-item>
			<u-cell-item  title="用户名" :arrow="false"  >
				<view slot="right-icon" style="display: flex;">
					<text>{{userInfo.username}}</text>
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
				type: 'text',
				border: true
			};
		},
		created() {
			this.userInfo=uni.getStorageSync('userInfo');
			this.value=this.userInfo.nickname;
		},
		onLoad() {
	
		},
		methods:{
			async changeName(){
				var res = await User.updateName(this.value);
				if(res.code==200){
					uni.showToast({
						title:res.msg
					})
					this.userInfo.nickname=this.value;
					uni.setStorageSync('userInfo',this.userInfo);
					this.show=false;
				}else{
					uni.showToast({
						title:res.msg,
						icon:"none"
					})
				}
			},
			clickCell(e){
				console.log(e)
				this.show=true;
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
