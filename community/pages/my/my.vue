<template>
	<view>
		<user-header :Id="userInfo.Id" :isGo="true"></user-header>
		<view class="Limit" style="margin-top: 30rpx;">
			<!-- #ifdef H5 || APP-PLUS -->
				<u-button type="primary" @click="goLogin" v-if="!isLogin">登录账号</u-button>
			<!-- #endif -->
			<!-- #ifdef MP-WEIXIN -->
				<u-button type="primary" open-type="getUserInfo" @getuserinfo="getuserinfo" v-if="!isLogin">登录账号</u-button>
			<!-- #endif -->
		</view>
		<view class="myCard myLimit" style=" margin-top: 50rpx;display: flex;flex-wrap: wrap;justify-content: space-between;align-content: space-between;" v-if="isLogin">
			<grid v-for="(item,index) in list"
				:toastTitle="item.toast"
				:key="index" :index="index" :name="item.name" :type="item.type" :path="item.path" :title="item.title" size="40rpx" @clickGrid="clickGrid"></grid>
		</view>
		<view class="myLimit" style="margin-top: 30rpx;" v-if="isLogin">
			<view class="closeLogin" hover-class="small-hover" hover-stay-time="300" @click="closeLogin">
				退出登录
			</view>
		</view>
		<!-- <u-tabbar active-color="#5466ff" v-model="current" :list="tabbar" :mid-button="true" @change="changeTab" height='7vh'></u-tabbar> -->
		<tabbar :current='current'></tabbar>
	</view>
</template>

<script>
	import tabbar from "../../components/tabbar/tabbar.vue"
	import grid from "../../components/grid/grid.vue"
	import userHeader from "../../components/user-header/user-header.vue"
	export default {
		data() {
			return {
				isLogin:false,
				userInfo:{

				},
				current:2,
				tabbar:tabbar,
				list:[
					{
						name:"iconxiaoxi",
						title:"我的发布",
						type:'path',
						path:"/pages/my/userSend"
					},
					{
						name:"iconxihuan",
						title:"我的收藏",
						type:'path',
						path:"/pages/my/userSend?type=collection"
					},
					{
						name:"iconhuiyuan",
						title:"vip特权"
					},
					{
						name:"iconshezhi",
						title:"设置",
						type:'path',
						path:"/pages/my/set"
					}
		
				]
			};
		},
		components:{
			grid,
			userHeader,
			tabbar
		},
		methods:{
			clickGrid(e){
				if(e==2){
					uni.showToast({
						title:'联系管理员开通',
						icon:"none"
					})
				}
			},
			getuserinfo(e){
				
				uni.login({
				  provider: 'weixin',
				  success: function (loginRes) {
				    console.log(loginRes.code);
				  }
				});
			},
			changeTab(index){
				this.current=index;
				uni.reLaunch({
					url:this.tabbar[index].path
				})
			},
			goLogin(){
				uni.navigateTo({
					url:"./login"
				})
			},
			closeLogin(){
				uni.clearStorage();
				this.userInfo={};
				this.isLogin=false;

			}
		},
		onLoad() {
			if(uni.getStorageSync('token') && uni.getStorageSync('userInfo')){
				this.isLogin=true;
				this.userInfo=uni.getStorageSync('userInfo');
			}
		},
		mounted() {

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
	.closeLogin{
		width: 100%;
		height: 100rpx;
		display: flex;
		justify-content: center;
		align-items: center;
		background-color: #fff;
		box-shadow: 4rpx 5rpx 30rpx #eeeff9;
	}
</style>
