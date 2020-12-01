<template>
	<view class="Limit">
		<u-row gutter="16">
			<u-col span="6">
				<view style="display: flex;">
					<view class="flexCenter">
						<view style="width: 20rpx;height: 20rpx;border-radius: 50%;margin-right: 20rpx;" :style="pointColor!=''?'background-color:'+pointColor:''"></view>
					</view>
					<text :style="color!=''?'color:'+color:''">{{title}}</text>
				</view>
			</u-col>
			<u-col span="6">
				<view style="display: flex;align-items: center;justify-content: flex-end;">
					<u-button size="mini" type="warning" :custom-style="btnStyle" @click="sendBtn">{{btnText}}</u-button>
				</view>
			</u-col>
		</u-row>
	</view>
</template>

<script>
	export default {
		data() {
			return {
				
			};
		},
		methods:{
			sendBtn(e){
				this.$emit('clickBtn',true);
			}
		},
		props:{
			title:{
				type:String,
				default:'标题'
			},
			color:{
				type:String,
				default:'#444'
			},
			pointColor:{
				type:String,
				default:'#5466ff'
			},
			isPoint:{
				type:Boolean,
				default:true
			},
			isBtn:{
				type:Boolean,
				default:true
			},
			btnStyle:{
				type:Object
			},
			btnText:{
				type:String,
				default:'发布'
			}
		}
	}
</script>

<style>

</style>
