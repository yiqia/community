<template>
	<view>
			<view style="position: relative;width: 100%;height: 100%;">
				<view style="width: 100%;text-align: center;line-height: 80rpx;margin-bottom: 30rpx;">评论</view>
				<block v-for="(item,index) in info" :key="index">
					<user-row 
						:info="item" 
						:index="index"
						@tapGood="tapGood"
						@tapGoodTwo="tapGoodTwo"
					></user-row>
				</block>
				<view class="comment-input" style="position: fixed;bottom: 0;width: 100%;z-index: 999;">
					<comment-input
						@sendComment="sendComment"
					></comment-input>
				</view>
			</view>
	</view>
</template>

<script>
	import userRow from "../user-row/index.vue"
	import commentInput from "../comment-input/comment-input.vue"
	export default {
		data() {
			return {
				isShow:false
			};
		},
		props:['info'],
		components:{
			userRow,
			commentInput
		},
		watch:{
		},
		methods:{
			close(){
				this.$emit("close",this.isShow);
			},
			sendComment(e){
				this.$emit('sendComment',e);
			},
			tapGood(e){
				this.$emit("tapGood",e);
			},
			tapGoodTwo(e){
				this.$emit("tapGoodTwo",e);
			}
		},
		mounted() {
			const that = this;

		}
	}
</script>

<style lang="scss">

</style>
