<template>
</template>

<script>
</script>

<style>
	@import "/colorui/main.css";
	@import "/colorui/icon.css";
	@import "/static/fonts/iconfont.css";
</style>
<template>
	<view>
	<view class="u-page" style="height: 93vh;">
		<view class="cu-bar bg-white solid-bottom ">
			<view class="action">
				<text class="cuIcon-title text-orange "></text> 手动打卡
			</view>
		</view>
		<view class="cu-modal" :class="modalName=='gridModal'?'show':''" @tap="hideModal">
			<view class="cu-dialog" @tap.stop>
				<radio-group class="block" @change="Gridchange">
					<view class="cu-list menu text-left">
						<view class="cu-item" v-for="(item,index) in 3" :key="index">
							<label class="flex justify-between align-center flex-sub">
								<view class="flex-sub">{{index +3}} 列</view>
								<radio class="round" :value="(index + 3) + ''" :class="gridCol==index+3?'checked':''" :checked="gridCol==index+3"></radio>
							</label>
						</view>
					</view>
				</radio-group>
			</view>
		</view>
		<view class="cu-list grid" :class="['col-' + gridCol,gridBorder?'':'no-border']">
			<view class="cu-item" v-for="(item,index) in cuIconList" :key="index" v-if="index<gridCol*2">
				<view :class="['cuIcon-' + item.cuIcon,'text-' + item.color]">
					<view class="cu-tag badge" v-if="item.badge!=0">
						<block v-if="item.badge!=1">{{item.badge>99?'99+':item.badge}}</block>
					</view>
				</view>
				<text>{{item.name}}</text>
			</view>
		</view>
		<view class="cu-bar bg-white margin-top">
			<view class="action">
				<text class="cuIcon-title text-orange "></text> 个人记录
			</view>
		</view>
		<view class="cu-list menu-avatar comment solids-top">
			<view class="cu-item">
				<view class="cu-avatar round bg-blue ">
					<text class="icon iconfont">&#xe8c6;</text>
				</view>
				<view class="content">
					<view class="text-grey">室内跑步</view>
					<view class="text-gray text-content text-df">
						2.3km
					</view>
					<view class="bg-grey padding-sm radius margin-top-sm  text-sm">
						<view class="flex">
							<view>运动用时：00:30:37</view>
						</view>
					</view>
					<view class="margin-top-sm flex justify-between">
						<view class="text-gray text-df">2018年12月4日</view>
						
					</view>
				</view>
			</view>
		
			<view class="cu-item">
				<view class="cu-avatar round bg-red ">
					<text class="icon iconfont">&#xe8c2;</text>
				</view>				
				<view class="content">
					<view class="text-grey">篮球</view>
					<view class="text-gray text-content text-df">
						卡路里消耗：413
					</view>
					<view class="bg-grey padding-sm radius margin-top-sm  text-sm">
						<view class="flex">
							<view>运动用时：00:30:37</view>
						</view>
					</view>
					<view class="margin-top-sm flex justify-between">
						<view class="text-gray text-df">2018年12月4日</view>
						
					</view>
				</view>
			</view>
		</view>
	</view>
	<tabbar  :current='current' :show="show" @changeShow="changeShow"></tabbar>
	</view>
</template>
<script>
	import tabbar from "../../components/tabbar/tabbar"
	export default {
		data() {
			return {
				current:0,
				show:false,
				tabsCurrent:1,
				swiperCurrent:0,
				gridBorder: false,
				cuIconList: [{
					cuIcon: 'cardboardfill',
					color: 'red',
					name: '饮食'
				}, {
					cuIcon: 'recordfill',
					color: 'orange',
					badge: 1,
					name: '运动'
				}, {
					cuIcon: 'picfill',
					color: 'yellow',
					badge: 0,
					name: '睡眠'
				}, {
					cuIcon: 'noticefill',
					color: 'olive',
					badge: 22,
					name: '跑步'
				}, {
					cuIcon: 'upstagefill',
					color: 'cyan',
					badge: 0,
					name: '健身'
				}, {
					cuIcon: 'clothesfill',
					color: 'blue',
					badge: 0,
					name: '步行'
				}, {
					cuIcon: 'discoverfill',
					color: 'purple',
					badge: 0,
					name: '发现'
				}, {
					cuIcon: 'questionfill',
					color: 'mauve',
					badge: 0,
					name: '帮助'
				}, {
					cuIcon: 'commandfill',
					color: 'purple',
					badge: 0,
					name: '问答'
				}, {
					cuIcon: 'brandfill',
					color: 'mauve',
					badge: 0,
					name: '版权'
				}],
				modalName: null,
				gridCol: 3,
			};
		},
		methods:{
			changeShow(e){
				console.log(e)
				this.show=true;
			}
		}
		
	}
</script>

<style>
	@import "/colorui/main.css";
	@import "/colorui/icon.css";
	@import "/static/fonts/iconfont.css";
	.page {
		height: 100Vh;
		width: 100vw;
	}

	.page.show {
		overflow: hidden;
	}

	.switch-sex::after {
		content: "\e716";
	}

	.switch-sex::before {
		content: "\e7a9";
	}

	.switch-music::after {
		content: "\e66a";
	}

	.switch-music::before {
		content: "\e6db";
	}
</style>
