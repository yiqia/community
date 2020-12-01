<template>
	<view class="container">
		<view class="header">
			<view style="width: 10%;height: 100%;display: flex;">
				<view class="flexCenter" style="width: 100rpx;height: 100%;">
					<u-avatar :src="info.avatar" mode="circle" size="75"></u-avatar>
				</view>
			</view>
			<view style="width:90%;height: 100%;display: flex;margin-left: 10rpx;">
				<view style="width:100%;height: 100%;color: #595959;margin-left: 10rpx;display: flex;flex-direction: column;">
					<text style="color: #a0a0a0;">{{ info.nickname ? info.nickname : info.username }}</text>
					<view @click="tapCommentContent">
						<text>{{ info.content }}</text>
					</view>
					<view style="">
						<text style="color: #b3b3b3;font-size: 25rpx;">{{ info.create_time }}</text>
					</view>
				</view>
				<view style="padding: 25rpx 15rpx;" @click="tapGood">
					<u-icon size="35" :name="info.isGood==0?'heart':'heart-fill'" :color="info.isGood==1?'#ffca12':'#999999'"></u-icon>
					<text style="color: #999999;display: block;text-align: center;" v-if="info.good < 1000">{{ info.good }}</text>
					<text style="color: #999999;display: block;text-align: center;" v-if="info.good < 10000 && info.good >= 1000">
						{{ info.good / 1000 }}.{{ info.good / 100 }}k
					</text>
					<text style="color: #999999;display: block;text-align: center;" v-if="info.good > 10000">{{ info.good / 10000 }}w</text>
				</view>
			</view>
		</view>
		<view class="comment-reply" style="margin-top: 10rpx;margin-left: 75rpx;" v-for="(item,index) in info.twoComment" :key="index">
			<view class="header">
				<view style="width: 10%;height: 100%;display: flex;">
					<view class="flexCenter" style="width: 100rpx;height: 100%;">
						<u-avatar :src="item.avatar" mode="circle" size="50"></u-avatar>
					</view>
				</view>
				<view style="width:90%;height: 100%;display: flex;margin-left: 10rpx;">
					<view style="width:100%;height: 100%;color: #595959;margin-left: 5rpx;">
						<text style="color: #a0a0a0;">{{item.nickname ? item.nickname : item.username }}</text>
						<text style="display: block;">{{item.content}}</text>
						<text style="color: #b3b3b3;font-size: 25rpx;">{{item.create_time}}</text>
						<load-more text="加载更多评论" v-if="index>2"></load-more>
					</view>
					<view style="padding: 30rpx 15rpx;" @click="tapGoodTwo" :data-index="index">
						<u-icon size="35" :name="item.isGood==0?'heart':'heart-fill'" :color="item.isGood==1?'#ffca12':'#999999'"></u-icon>
						<text style="color: #999999;display: block;text-align: center;" v-if="item.good < 1000">{{ item.good }}</text>
						<text style="color: #999999;display: block;text-align: center;" v-if="item.good < 10000 && item.good >= 1000">
							{{ item.good / 1000 }}.{{ item.good / 100 }}k
						</text>
						<text style="color: #999999;display: block;text-align: center;" v-if="item.good > 10000">{{ item.good / 10000 }}w</text>
					</view>
				</view>
			</view>
		</view>
		
	</view>
</template>

<script>
import loadMore from '../load-more/load-more.vue';
export default {
	name: 'user-row',
	data() {
		return {};
	},
	components: {
		loadMore
	},
	props: ['info','index'],
	mounted() {
	},
	methods: {
		tapCommentContent(){
			this.info.index=this.index;
			uni.$emit('clickCommentContent',this.info);
		},
		tapGood(){
			this.$emit('tapGood',{
				Id:this.info.Id,
				index:this.index,
				isGood:this.info.isGood
			});
		},
		tapGoodTwo(e){
			const i= e.currentTarget.dataset.index;
			this.$emit('tapGoodTwo',{
				Id:this.info.twoComment[i].Id,
				index:this.index,
				indexTwo:i,
				isGood:this.info.twoComment[i].isGood
			});
		}
	}
};
</script>

<style lang="scss">
.header {
	width: 95%;
	margin: 0 auto;
	display: flex;
}
</style>
