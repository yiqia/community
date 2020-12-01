<template>
	<view>
		<u-popup v-model="isShow" mode="bottom" length="80%" @close="close">
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
				<view style="width: 100%;height: 10vh;">
					
				</view>
				<view class="comment-input" style="position: fixed;bottom: 0;width: 100%;">
					<comment-input
						@sendComment="sendComment"
					></comment-input>
				</view>
			</view>
		</u-popup>
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
		props:["show",'info'],
		components:{
			userRow,
			commentInput
		},
		watch:{
			show(){
				this.isShow=this.show;	
			}
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
