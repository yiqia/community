<template>
	<view>
		<view class="u-page" style="height: 85vh;">
			<view style="width: 70%;margin: 0 auto;">
				<u-tabs-swiper active-color="#5466ff" ref="uTabs" swiperWidth="750" :list="list" :is-scroll="false" :current="tabsCurrent" @change="change" height="80"></u-tabs-swiper>
			</view>
			<!-- <swiper class="swiper-box" :current="swiperCurrent"  @transition="transition" @animationfinish="animationfinish">
				<swiper-item class="swiper-item" v-for="(item, index) in list" :key="index">
					<scroll-view scroll-y style="height: 100%;width: 100%;"> -->
							<block v-for="(i,j) in communityList" :key="'card'+j">
								<community-card
										@tapComment="tapComment"
										:info="i" :isIndex="j"
										@clickGood="clickGood"
										@clickCollection="clickCollection"
										@clickFollow="clickFollow"
								></community-card>
							</block>
							<community-comment :show="showComment" @close="closeComment"></community-comment>
							<view style="width: 100%;height: 100rpx;"></view>
				<!-- 	</scroll-view>
				</swiper-item>
			</swiper> -->
		</view>
		<u-tabbar active-color="#5466ff" v-model="current" :list="tabbar" :mid-button="true" @change="changeTab"></u-tabbar>
	</view>
</template>

<script>
// 一奇开源 QQ330729121
import communityCard from '../../components/community-card/index.vue';
import communityComment from '../../components/community-comment/index.vue';
import tabbar from "../../common/tabbar.js"
import {Community} from "../../model/community";
export default {
	data() {
		return {
			current:0,
			tabsCurrent:1,
			swiperCurrent:1,
			tabbar:tabbar,
			communityList:[],
			list: [
				{
					name: '关注'
				},
				{
					name: '最新'
				},
				{
					name: '最热'
				}
			],
			showComment: false
		};
	},
	components: {
		communityCard,
		communityComment,

	},
	mounted() {

	},
	async onLoad(){
		var res = await Community.getContent();
		this.communityList=res.accoumulator;
		console.log(this.communityList);
	},
	methods: {
		//关注
		async clickFollow(e){
			const res= await Community.sendFollow(e.Id);
			this.communityList[e.isIndex].isFollow=!e.isFollow;
		},
		//点赞
		async clickGood(e){
			const res= await Community.sendGood(e.Id);
			//#ifdef APP-PLUS || MP-WEIXIN
			uni.vibrateShort({
				success: function () {
					console.log('抖动');
				}
			});
			//#endif
			this.communityList[e.isIndex].isGood=!e.isGood;
			e.isGood==0?this.communityList[e.isIndex].good+=1:this.communityList[e.isIndex].good-=1;
		},
		//收藏
		async clickCollection(e){
			const res= await Community.sendCollection(e.Id);
			//#ifdef APP-PLUS||MP-WEIXIN
			uni.vibrateShort({
				success: function () {
					console.log('抖动');
				}
			});
			//#endif
			this.communityList[e.isIndex].isCollection=!e.isCollection;
			e.isCollection==0?this.communityList[e.isIndex].collection+=1:this.communityList[e.isIndex].collection-=1;
		},
		tapComment() {
			this.showComment = true;
		},
		closeComment(e) {
			this.showComment = false;
		},
		// tab栏切换
		change(index) {
			 this.swiperCurrent = index;
		},
		changeTab(index){
			this.current=index;
			uni.reLaunch({
				url:this.tabbar[index].path
			})
		},
		transition({ detail: { dx } }) {
			this.$refs.uTabs.setDx(dx);
		},
		animationfinish({ detail: { current } }) {
			this.$refs.uTabs.setFinishCurrent(current);
			this.swiperCurrent = current;
			this.tabsCurrent = current;
		}
	}
};
</script>

<style lang="scss">
	.swiper-box {
		flex: 1;
		height: calc(100vh - 50rpx - 80rpx - 100rpx - var(--window-top));
	}
	.swiper-item {
		height: 100%;
	}
</style>
