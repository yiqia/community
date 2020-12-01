<template>
	<view class="container">
		<text :style="'color:'+color" style="margin-right: 10rpx;">{{text}}</text>
		<u-icon name="arrow-down" :color="color" :size="size"></u-icon>
	</view>
</template>

<script>
	export default {
		data() {
			return {
				
			};
		},
		props:{
			text:{
				type:String,
				default:"加载更多"
			},
			color:{
				type:String,
				default:"#a7a7a7"
			},
			size:{
				type:String,
				default:"15"
			}
		}
	}
</script>

<style>

</style>
