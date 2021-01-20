<template>
	<view>
		<view class="container">
			<view class="Limit">
				<!-- 说说的头部 -->
				<view class="header">
					<view style="width: 70%;height: 100%;display: flex;">
						<view class="flexCenter u-skeleton-circle" style="width: 100rpx;height: 100%;" @click="clickHeader(info.user_id)">
							<u-avatar :src="info.avatar" mode="circle" size="75"></u-avatar>
						</view>
						<view style="height: 100%;margin-top: 15rpx;color: #595959;">
							<view style="margin: 8rpx 0;">
								<text style="font-weight: 600;margin-right: 20rpx;" :style="info.userGroupId!=1?'color:#ff5457':''">{{info.nickname?info.nickname:info.username}}</text>
								<u-tag v-if="info.userGroupId!=1"
									:text="info.userGroupName" 
									size="mini" 
									:type="info.userGroupType" />
								<u-tag v-if="info.isTop==1"
									text="置顶" 
									size="mini" 
									type="error" style="margin-left: 10rpx;"/>
							</view>
							<text style="color: #b3b3b3;">{{info.create_time}}</text>
							
						</view>
					</view>
					<view style="width: 30%;height: 100%;display: flex;justify-content: flex-end;align-items: center;">
						<view style="" v-if="info.user_id!=userInfo.Id">
							<!-- #ifdef H5 -->
								<u-button :customStyle="info.isFollow==1?{}:customStyle" :type="info.isFollow==1?'default':'warning'" size="mini" @click="tapFollow(info.user_id)" :plain="info.isFollow==1?true:false">{{info.isFollow==1?'已关注':'关注'}}</u-button>
							<!-- #endif -->
							<!-- #ifdef MP-WEIXIN -->
								<u-button :customStyle="info.isFollow==1?'':customStyle" :type="info.isFollow==1?'default':'warning'" size="mini" @click="tapFollow(info.user_id)" :plain="info.isFollow==1?true:false">{{info.isFollow==1?'已关注':'关注'}}</u-button>
							<!-- #endif -->
						</view>
						<view style="padding: 30rpx;" @click="tapMoreOption">
							<u-icon size="35" name='more-dot-fill' color="#a0a0a0"></u-icon>
							<u-select v-model="optionListShow" @confirm="changeMoreSelect" :list="optionList"></u-select>
						</view>
					</view>
				</view>
				<!-- 内容 -->
				<view style="color:#333333;margin-left: 10rpx;font-size: 30rpx;margin-top: 10rpx;margin-bottom: 30rpx">
					<text>{{info.content.length>150 && isShowAll!=true?info.content.substring(0,150)+'......':info.content}}</text>
				</view>
				<!-- 图片 -->
				<view style="margin-top: 32rpx;" v-if="info.images">
					<u-row gutter="6">
						<block v-if="info.images.length==1">
							<u-col span="12">
								<view class="community-image">
									<u-image :src="info.images[0]" :data-index="0"  @click="showImages(0)" mode="aspectFit" width="690" height="690"></u-image>
								</view>
							</u-col>
						</block>
						<block v-else-if="info.images.length==2" >
							<u-col span="6">
								<view class="community-image">
									<u-image :src="info.images[0]" :data-index="0"  @click="showImages(0)" mode="aspectFit" width="345" height="345"></u-image>
								</view>
							</u-col>
							<u-col span="6">
								<view class="community-image">
									<u-image :src="info.images[1]" :data-index="1" @click="showImages(1)" mode="aspectFit" width="345" height="345"></u-image>
								</view>
							</u-col>
						</block>
						<block v-else >
							<u-col span="4" v-for="(item,index) in info.images" :key="index">
								<view class="community-image">
									<u-image :src="item" :data-index="index"  @click="showImages(index)" mode="aspectFit" width="230" height="230"></u-image>
								</view>
							</u-col>
						</block>
					</u-row>
				</view>
				<!-- 视频 -->
				<view style="width: 100%;" v-if="info.video">
					
					<video id="myVideo"
						   style="width: 100%;max-height: 500rpx"
						   :src="info.video"
						   :poster="info.video+'?vframe/jpg/offset/2'"
						   controls>
					</video>
					
				</view>
				<view style="width: 100%;margin: 30rpx 0;" v-if="info.address">
					<view style="background-color: #f5f5f5;display: inline-block;padding: 10rpx 20rpx;border-radius: 10rpx;color: #444;" @click="openAdress">
						<view style="display: flex;">
							<u-icon name="map" color="#7980ff" size="40"></u-icon>
							<view style="margin-left: 10rpx;">
								{{info.address}}
							</view>
						</view>
					</view>
				</view>
				<view class="clickList">
					<u-row>
						<u-col span="2">
							<view style="color: #999999;" @click="tapGood" :data-id="info.Id" hover-class="small-hover" hover-stay-time="300">
								<u-icon :name="info.isGood==1?'thumb-up-fill':'thumb-up'" :color="info.isGood==1?'#ffca12':'#999999'" size="40"></u-icon>
								<text style="margin-left: 10rpx;" :style="isGood?'color: #5b5b5b;':'color: #999999;'">
									{{info.good}}</text>
							</view>
						</u-col>
						<u-col span="2">
							<view style="color: #999999;"  @click="tapCollection" :data-id="info.Id" hover-class="small-hover" hover-stay-time="300" >
								<u-icon :name="info.isCollection==1?'star-fill':'star'" :color="info.isCollection==1?'#ffca12':'#999999'" size="40"></u-icon>
								<text style="margin-left: 10rpx;" :style="isGood?'color: #5b5b5b;':'color: #999999;'">
									{{info.collection}}</text>
							</view>
						</u-col>
						<u-col span="2">
							<view style="color: #999999;" @click="tapComment"  :data-id="info.Id">
								<u-icon name="eye" color="#999999" size="40"></u-icon>
								<text style="margin-left: 10rpx;" :style="isGood?'color: #5b5b5b;':'color: #999999;'">
									{{info.showNumber}}</text>
							</view>
						</u-col>
						<u-col span="2">
							<view style="color: #999999;" @click="tapComment"  :data-id="info.Id">
								<u-icon name="chat" color="#999999" size="40"></u-icon>
								<text style="margin-left: 10rpx;" :style="isGood?'color: #5b5b5b;':'color: #999999;'">
									{{info.comment}}</text>
							</view>
						</u-col>
						<u-col span="2">
							<view style="color: #999999;text-align: end;" @click="tapShare">
								<!-- #ifndef H5 -->
									<u-icon name="zhuanfa" color="#999999" size="40"></u-icon>
								<!-- #endif -->
							</view>
						</u-col>
					</u-row>
				</view>
			</view>
			
			<u-gap height="21" bg-color="#f5f5f5"></u-gap>
		</view>
	</view>
</template>

<script>
	export default {
		data() {
			return {
				//是否关注
				isFollow:false,
				//更多选项
				optionList:[
					{
						value: 1,
						label: '举报'
					}
					
				],
				//更多选项是否显示
				optionListShow:false,
				//是否点赞
				isGood:false,
				isCollection:false,
				isComment:false,
				customStyle:{
					backgroundColor:"#5466ff"
				},
				location:""
			};
		},
		methods:{
			clickHeader(e){
				if(this.noHeaderGo)return;
				uni.navigateTo({
					url:'/pages/my/userSend?Id='+e
				})
			},
			//选择了更多的选项
			changeMoreSelect(e){
				e[0].Id=this.info.Id;
				e[0].index=this.isIndex;
				this.$emit('changeMoreSelect',e[0]);
			},
			openAdress(){
				var location = this.info.location;
				var address =location.split(',');
				uni.openLocation({
					latitude: address[1],
					longitude: address[0],
					success: function () {
						console.log('success');
					}
				});
			},
			//点击关注
			tapFollow(e){
				this.$emit('clickFollow',{
					Id:e,
					isFollow:this.info.isFollow,
					isIndex:this.isIndex
				})
			},
			//查看更多的功能选项
			tapMoreOption(){
				this.optionListShow=true;
			},
			//查看图片
			showImages(e){
				var images=[];
				this.info.images.forEach((item,index)=>{
					if(item.indexOf('?')){
						images[index]=item.split('?')[0]
					}else{
						images[index]=item;
					}
				})
				uni.previewImage({
					urls: images,
					current:e
				});
			},
			//点赞
			tapGood(e){
				this.$emit('clickGood',{
					Id:e.currentTarget.dataset.id,
					isGood:this.info.isGood,
					isIndex:this.isIndex
				})
			},
			//收藏
			tapCollection(e){
				this.$emit('clickCollection',{
					Id:e.currentTarget.dataset.id,
					isCollection:this.info.isCollection,
					isIndex:this.isIndex
				})
			},
			//评论
			tapComment(e){
				// #ifndef H5
					this.$emit("tapComment",{
						Id:e.currentTarget.dataset.id,
						isShow:true,
						isIndex:this.isIndex
					})
				// #endif
				// #ifdef H5
					this.$emit('clickH5comment',this.info.Id);
				// #endif
				
			},
			//分享
			tapShare(){

			}
		},
		mounted(){
			if(this.info['user_id']==uni.getStorageSync('userInfo').Id){
				this.optionList.push({
					value:2,
					label: '删除'
				});
			}
			if(this.info.isTop==1&& uni.getStorageSync('userInfo').group==2){
				this.optionList.push({
					value:3,
					label: '取消置顶'
				})
			}
		},
		created(){
			this.userInfo=uni.getStorageSync('userInfo');
			
		},
		initOption(){

		},
		props:['info','isIndex','noHeaderGo','isShowAll']
	}
</script>

<style lang="scss">
	.header{
		width: 100%;
		height: 115rpx;
		display: flex;
	}
	.community-image{
		width: 100%;
		height: 100%;
		margin-bottom: 7rpx;
	}
	.clickList{
		width: 100%;
		height: 55rpx;
		margin: 15rpx 0;
	}
</style>
