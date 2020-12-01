<template>
	<view class="Limit" style="width: 90%;">
		<view style="margin: 50rpx 0;color: #606266;">
			本程序前后端均由一奇开发,<br>使用uniapp+thinkphp5.1。<br>
			前端UI框架使用uView，后台管理系统使用layui;<br>
			前后端均采用MVC设计模式，边学边做，没有做好的地方请谅解。
			<br>
			有问题也可以反馈邮箱：330729121@qq.com
		</view>
		<u-time-line>
				<u-time-line-item :nodeTop="index==0?2:0" v-for="(item,index) in data" :key="index">
					<!-- 此处自定义了左边内容，用一个图标替代 -->
					<template v-slot:node v-if='index==0'>
						<view class="u-node" style="background: #19be6b;">
							<!-- 此处为uView的icon组件 -->
							<u-icon name="pushpin-fill" color="#fff" :size="24"></u-icon>
						</view>
					</template>
					<template v-slot:content>
						<view>
							<view class="u-order-title">{{index==0?"当前版本号":"版本号"}} {{item.version}}</view>
							<view class="u-order-desc" style="margin-top: 10rpx;">
								{{item.info[0]}}
							</view>
							<view class="u-order-desc">
								{{item.info[1]}}
							</view>
							<view class="u-order-desc">
								{{item.info[2]}}
							</view>
							<view class="u-order-time">{{item.time}}</view>
						</view>
					</template>
				</u-time-line-item>
			</u-time-line>
	</view>
</template>
<script>
	export default{
		name:"about",
		data(){
			return {
				data:[
					//1.新增,2.修改,3.删除
					{
						version:"1.1",
						info:[
							'新增用户组展示，红名显示',
							'',
							''
						],
						time:"2020.08.10 12:35"
					},
					{
						version:"1.0",
						info:[
							'新增设置页面，修改密码功能，意见反馈功能，以及关于我们',
							'',
							''
						],
						time:"2020.08.10 11:18"
					},
					{
						version:"0.9",
						info:[
							'新增我的发布，我的收藏页面',
							'',
							''
						],
						time:"2020.08.09 12:00"
					},
					{
						version:"0.8",
						info:[
							'新增查看我的资料页面，增加更换头像，更换昵称功能',
							'修复加载个人资料之前的状态样式',
							''
						],
						time:"2020.08.08 12:00"
					},
					{
						version:"0.7",
						info:[
							'新增二级评论，二级评论点赞功能',
							'',
							''
						],
						time:"2020.08.05 12:00"
					},
					{
						version:"0.6",
						info:[
							'新增动态详情页面',
							'修复展示不同圈子动态问题',
							''
						],
						time:"2020.08.04 12:00"
					},
					{
						version:"0.5",
						info:[
							'新增发布图片内容和视频内容功能',
							'',
							''
						],
						time:"2020.08.03 12:00"
					},
					{
						version:"0.4",
						info:[
							'新增点赞，评论，收藏，举报，关注，删除功能',
							'',
							''
						],
						time:"2020.08.02 12:00"
					},
					{
						version:"0.3",
						info:[
							'新增首页展示信息页面，新增我的页面',
							'',
							''
						],
						time:"2020.08.01 12:00"
					},
					{
						version:"0.2",
						info:[
							'新增登录注册功能',
							'',
							''
						],
						time:"2020.07.31 12:00"
					},
					{
						version:"0.1",
						info:[
							'搭建页面框架',
							'',
							''
						],
						time:"2020.07.30 12:00"
					}
				]
			}
		},
		methods:{
			
		},
		mounted(){
			
		}
	}
</script>
<style lang="scss" scoped>
	.u-node {
		width: 44rpx;
		height: 44rpx;
		border-radius: 100rpx;
		display: flex;
		justify-content: center;
		align-items: center;
		background: #d0d0d0;
	}
	
	.u-order-title {
		color: #333333;
		font-weight: bold;
		font-size: 32rpx;
	}
	
	.u-order-desc {
		color: rgb(150, 150, 150);
		font-size: 28rpx;
		margin-bottom: 6rpx;
	}
	
	.u-order-time {
		color: rgb(200, 200, 200);
		font-size: 26rpx;
	}
</style>