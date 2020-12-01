<template>
	<view class="container">
		<view style="width: 100%;min-height: 148rpx;background-color: #fff;border-top:1px solid #eeeeee;">
			<!-- <view style="width: 95%;height: 50rpx;display: flex;align-items: center;margin: 0 auto;">
				<view style="width: 70%;height: 100%;">
					<u-icon name="photo" color="#d1d1d1" size="35"></u-icon>
				</view>
				<view style="width: 30%;text-align: end;">
					
				</view>
			</view> -->
			<view style="width: 100%;height: 100%;">
				<!-- <u-input v-model="value" type="textarea" :border="false" maxlength="200" placeholder="说点什么吧,直接回车或者换行发送"/> -->
				<u-field
					v-model="value"
					type="textarea"
					maxlength="250"
					label-width="0"
					:placeholder="placeholder"
					:auto-height="true"
				>
				<u-button size="mini" slot="right" type="success" @click="sendComment">发送</u-button>
				</u-field>
			</view>
			
		</view>
	</view>
</template>

<script>
	export default {
		data() {
			return {
				value:"",
				clickUser:{},
				placeholder:"快点评论点什么吧"
			};
		},
		mounted() {
			const that = this;
			uni.$on('commentOk',e=>{
				if(e.code){
					that.value=""
				}
			})
			uni.$on('clickCommentContent',e=>{
				this.value='回复'+(e.nickname?e.nickname:e.username)+"：";
				this.clickUser=e;
			})
		},
		methods:{
			sendComment(){
				var e = this.clickUser;
				if(this.value.indexOf('回复'+(e.nickname?e.nickname:e.username))!=-1){
					this.value=this.value.replace('回复'+(e.nickname?e.nickname:e.username)+"：",'');
					this.$emit('sendComment',{
						Id:this.clickUser.Id?this.clickUser.Id:null,
						index:this.clickUser.index,
						content:this.value
					})
				}else{
					this.$emit('sendComment',{
						Id:null,
						index:this.clickUser.index,
						content:this.value
					})
				}
				
			
			}
		}
	}
</script>

<style>
</style>
