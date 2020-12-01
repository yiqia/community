<template>
	<view>
		<view style="width: 300rpx;height: 260rpx;box-shadow: 4rpx 5rpx 30rpx #eeeff9;margin: 20rpx 0;" class="flexCenter" hover-class="small-hover" @click="clickGrid">
			<view style="display:flex;flex-direction: column;">
				<view class="flexCenter" style="margin-bottom:20rpx;">
					<view class="iconfont" :class="name" :style="'font-size:'+size"></view>
				</view>
				<text style="text-align: center;color: #333333;">{{title}}</text>
			</view>
			
		</view>
	</view>
</template>

<script>
	export default {
		data() {
			return {
				
			};
		},
		methods:{
			clickGrid(e){
				if(this.type=="path"){
					uni.navigateTo({
						url:this.path
					})
				}
				this.$emit('clickGrid',this.index)
			}
		},
		props:{
			name:{
				type:String,
			},
			size:{
				type:String,
				default:'30rpx'
			},
			index:{
				type:Number,
			},
			title:{
				type:String
			},
			path :{
				type:String
			},
			type:{
				type:String
			}
		}
	}
</script>

<style lang="scss">

</style>
