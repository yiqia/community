<template>
	<view class="container">
		<view class="u-page" style="height: 93vh;">
		<u-popup v-model="addFoodShow" mode="top" height="800rpx" >
			 <swiper class="swiper" :indicator-dots="false" :autoplay="false">
				<swiper-item>
					<view class="swiper-item uni-bg-red">
						<u-grid :col="3" >
								<u-grid-item>
									<u-image width="60rpx" height="60rpx" src="../../static/images/icon/food-1.png"></u-image>
									<view class="grid-text">早餐</view>
								</u-grid-item>
								<u-grid-item>
									<u-image width="60rpx" height="60rpx" src="../../static/images/icon/nood.png"></u-image>
									<view class="grid-text">午餐</view>
								</u-grid-item>
								<u-grid-item>
									<u-image width="60rpx" height="60rpx" src="../../static/images/icon/kafei.png"></u-image>
									<view class="grid-text">下午茶</view>
								</u-grid-item>
								<u-grid-item>
									<u-image width="60rpx" height="60rpx" src="../../static/images/icon/zhushi.png"></u-image>
									<view class="grid-text">晚餐</view>
								</u-grid-item>
								<u-grid-item>
									<u-image width="60rpx" height="60rpx" src="../../static/images/icon/malatang.png"></u-image>
									<view class="grid-text">加餐</view>
								</u-grid-item>
							</u-grid>
					</view>
				</swiper-item>
				<swiper-item>
					<view class="swiper-item uni-bg-green">
						<u-grid :col="3" >
								<u-grid-item>
									<u-image width="60rpx" height="60rpx" src="../../static/images/icon/egg.png"></u-image>
									<view class="grid-text">鸡蛋</view>
								</u-grid-item>
								<u-grid-item>
									<u-image width="60rpx" height="60rpx" src="../../static/images/icon/dangao.png"></u-image>
									<view class="grid-text">蛋糕</view>
								</u-grid-item>
								<u-grid-item>
									<u-image width="60rpx" height="60rpx" src="../../static/images/icon/chuanchuan.png"></u-image>
									<view class="grid-text">串串</view>
								</u-grid-item>
								<u-grid-item>
									<u-image width="60rpx" height="60rpx" src="../../static/images/icon/haixian.png"></u-image>
									<view class="grid-text">海鲜</view>
								</u-grid-item>
								<u-grid-item>
									<u-image width="60rpx" height="60rpx" src="../../static/images/icon/hanbao.png"></u-image>
									<view class="grid-text">汉堡</view>
								</u-grid-item>
								<u-grid-item>
									<u-image width="60rpx" height="60rpx" src="../../static/images/icon/kafei.png"></u-image>
									<view class="grid-text">咖啡</view>
								</u-grid-item>
								<u-grid-item>
									<u-image width="60rpx" height="60rpx" src="../../static/images/icon/kaoji.png"></u-image>
									<view class="grid-text">烤鸡</view>
								</u-grid-item>
								<u-grid-item>
									<u-image width="60rpx" height="60rpx" src="../../static/images/icon/malatang.png"></u-image>
									<view class="grid-text">麻辣烫</view>
								</u-grid-item>
								<u-grid-item>
									<u-image width="60rpx" height="60rpx" src="../../static/images/icon/nai.png"></u-image>
									<view class="grid-text">奶</view>
								</u-grid-item>
								<u-grid-item>
									<u-image width="60rpx" height="60rpx" src="../../static/images/icon/nood.png"></u-image>
									<view class="grid-text">面条</view>
								</u-grid-item>
								<u-grid-item>
									<u-image width="60rpx" height="60rpx" src="../../static/images/icon/pijiu.png"></u-image>
									<view class="grid-text">啤酒</view>
								</u-grid-item>
								<u-grid-item>
									<u-image width="60rpx" height="60rpx" src="../../static/images/icon/regou.png"></u-image>
									<view class="grid-text">热狗</view>
								</u-grid-item>
								<u-grid-item>
									<u-image width="60rpx" height="60rpx" src="../../static/images/icon/shutiao.png"></u-image>
									<view class="grid-text">薯条</view>
								</u-grid-item>
								<u-grid-item>
									<u-image width="60rpx" height="60rpx" src="../../static/images/icon/yinliao.png"></u-image>
									<view class="grid-text">饮料</view>
								</u-grid-item>
								<u-grid-item>
									<u-image width="60rpx" height="60rpx" src="../../static/images/icon/zhushi.png"></u-image>
									<view class="grid-text">米饭</view>
								</u-grid-item>
							</u-grid>
					</view>
				</swiper-item>
				<swiper-item>
					<view class="swiper-item uni-bg-blue">C</view>
				</swiper-item>
			</swiper>
			
		</u-popup>
		
		<div>
			<u-calendar v-model="show" :mode="mode" @change="changeDate"></u-calendar>
		</div>
		<view class="wrap">
				<u-row gutter="12">
					<u-col span="12">
						<view class="demo-layout bg-white box-shadow-white">
							<u-col span="12">
								<u-row gutter="12" class="dayDate">
									<u-col  span="6">
										<view class="demo-layout bg-white text-center" @click="show = true">
											{{date}}
										</view>
									</u-col>
									<u-col  span="6" class="addFoodBtn">
										<u-button type="success" size="mini" @click="addFoodShow=true">添加饮食</u-button>
									</u-col>
								</u-row>
							</u-col>
							<u-row gutter="12" justify="space-between">
								<u-col span="4">
									<view class="labelCardText">
										<p>饮食摄入</p>
										<p>242</p>
									</view>
								</u-col>
								<u-col span="4">
									<view class="demo-layout bg-white">
										<view class="labelCardText">
											<p>还可以吃</p>
											<p>1001</p>
										</view>
									</view>
								</u-col>
								<u-col span="4">
									<view class="demo-layout bg-white">
										<view class="labelCardText">
											<p>运动消耗</p>
											<p>10</p>
										</view>
									</view>
								</u-col>
							</u-row>
						</view>
					</u-col>
					
				</u-row>
				
		</view>
	</div>
	<!-- 饮食列表 -->
	<div v-for="(v,k) in everydayFoodList">
		<view class="cu-bar bg-white solid-bottom ">
			<view class="action">
				<text class="cuIcon-title text-orange "></text>{{v.title}}
			</view>
		</view>
		<view class="cu-list menu-avatar">
			<view class="cu-item" :class="modalName=='move-box-'+ item.Id?'move-cur':''" v-for="(item,index) in v.list" :key="index"
			 @touchstart="ListTouchStart" @touchmove="ListTouchMove" @touchend="ListTouchEnd" :data-target="'move-box-' + item.Id">
				<view class="cu-avatar imgBorder lg" :style="[{backgroundImage:`url(${item.image})`}]"></view>
				<view class="content">
					<view class="text-grey">{{item.name}}</view>
					<view class="text-gray text-sm">
						<text class=" text-red  margin-right-xs"></text>一只（中）</view>
				</view>
				<view class="action">
					<view class="text-grey text-xs">73卡</view>
				</view>
				<view class="move">
					<view class="bg-red">删除</view>
				</view>
			</view>
		</view>
	</div>
	
	</view>
	<tabbar  :current='current' :show="show" @changeShow="changeShow"></tabbar>
	</view>
</template>

<script>
	import {getEverydayFoodList} from "../../model/food.js";
	export default {
		data() {
			return {
				current:1,
				title: '素胚勾勒出青花，笔锋浓转淡',
				subTitle: '2020-05-15',
				thumb: 'http://pic2.sc.chinaz.com/Files/pic/pic9/202002/hpic2119_s.jpg',
				modalName: null,
				show: false,
				mode: 'date',
				date:"2021年4月21日",
				everydayFoodList:[],
				addFoodShow:false
			};
		},
		mounted(){
			this.initFoodList();
		},
		methods:{
			changeDate(e){
				this.date = e.result;
			},
			async initFoodList(){
				uni.showLoading({
					title:"请求中"
				})
				const res= await getEverydayFoodList();
				uni.hideLoading();
				this.everydayFoodList=res;
			},
			// ListTouch触摸开始
			ListTouchStart(e) {
				this.listTouchStart = e.touches[0].pageX
			},
			
			// ListTouch计算方向
			ListTouchMove(e) {
				this.listTouchDirection = e.touches[0].pageX - this.listTouchStart > 0 ? 'right' : 'left'
			},
			
			// ListTouch计算滚动
			ListTouchEnd(e) {
				if (this.listTouchDirection == 'left') {
					this.modalName = e.currentTarget.dataset.target
				} else {
					this.modalName = null
				}
				this.listTouchDirection = null
			}
		}
	};
</script>

<style scoped="scss">
	@import "/colorui/main.css";
	@import "/colorui/icon.css";
	.swiper{
		height: 800rpx;
	}
	.container{
		color: #444;
	}
	.iconSize{
		font-size: 40rpx;
	}
	.dayDate{
		padding-top: 25rpx;
	}
	.addFoodBtn{
		display: flex;
		justify-content: flex-end;
	}
	.labelCardText{
		text-align: center;
		padding: 20px 0;
	}
	.labelCardText p:nth-child(1){
		color: #e2dfe5;
		font-size: 12px;
	}
	.labelCardText p:nth-child(2){
		font-size:20px;
		font-weight: 600;
	}
	.wrap {
		padding: 24rpx;
	}

	.u-row {
		margin: 15rpx 0;
	}

	.demo-layout {
		border-radius: 8rpx;
		margin-bottom: 20rpx;
	}

	.bg-purple {
		background: #d3dce6;
	}

	.bg-purple-light {
		background: #e5e9f2;
	}

	.bg-purple-dark {
		background: #99a9bf;
	}
	.imgBorder{
		border-radius: 10rpx;
	}
</style>
