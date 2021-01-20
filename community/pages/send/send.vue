<template>
	<view>
		<header-title 
			title="发布你的内容吧"
			:isPoint="true"
			pointColor="#5466ff"
			:isBtn="true"
			:btnStyle="customStyle"
			@clickBtn="clickBtn"
		></header-title>
		
		<view class="content Limit">
				<view style="margin: 15rpx;">
					<u-input v-model="form.content" :auto-height="false" type="textarea" maxlength="1000" height="300" placeholder="想说你就多说点" :border="false" /></u-form-item>
					<view style="color: #C0C4CC;">
						<text>{{form.content.length}}/1000</text>
					</view>
				</view>
				<u-upload 
					:action="action"
					:header="header" 
					:upload-text="type=='video'?'选择视频':'选择图片'" 
					:max-count="type=='video'?1:9"
					:limitType="limitType"
					@on-success="uploadSuccess"
					:before-upload="beforeUpload"
					v-if="type=='image'"
					@on-error="onImageError"
					:show-tips="false"
					></u-upload>
				<upload v-if="type=='video'" @uploadData="uploadData"></upload>
				<u-cell-group>
					<u-cell-item title="添加地点" @click="addAddress" :arrow="false">
						<text class="iconfont icondingwei" slot="icon" style="margin-right: 10rpx;"></text>
						<text slot="right-icon">{{address}}</text>
					</u-cell-item>
					<u-cell-item title="发布类别" @click="changeGroup" :arrow="false">
						<text class="iconfont" slot="icon" style="margin-right: 10rpx;">
							&#xe8cb;
						</text>
						<text slot="right-icon">{{group.length>0?group[okGroup].name:''}}</text>
						<u-picker v-model="show" mode="selector" :range="group"  range-key="name" @confirm="confirm"></u-picker>
					</u-cell-item>
					<u-cell-item title="置顶" :arrow="false" v-if="userInfo.group==2">
						<text class="iconfont" slot="icon" style="margin-right: 10rpx;">
							&#xe729;
						</text>
						<view  slot="right-icon">
							<u-switch v-model="form.checked"></u-switch>
						</view>
					</u-cell-item>
				</u-cell-group>
		</view>
	</view>
</template>

<script>
// 一奇开源 QQ330729121
import {config} from "../../config/config";
import {Community} from "../../model/community";
import headerTitle from "../../components/header-title/header-title.vue"
import upload from "../../components/upload/upload.vue"
export default {
	data() {
		return {
			customStyle: {
				backgroundColor: '#5466ff',
				marginRight: '30rpx'
			},
			type:'image',
			header:{
				token:uni.getStorageSync('token')
			},
			uploadVideo:'',
			form: {
				content: '',
				checked: false
			},
			show: false,
			address:"",
			location:"",
			okGroup:0,
			limitType:['png', 'jpg', 'jpeg', 'webp', 'gif'],
			action:config.apiBaseUrl+'v1/file/uploadFile',
			fileList: [
				
			],
			group:[],
			userInfo:{}
		};
	},
	components:{
		headerTitle
	},
	async onLoad(e) {
		this.type=e.type;
		if(this.type=='video'){
			this.limitType=['mp4','avi','mov','flv'];
		}
		var res = await Community.getCommunityGroup();
		if(res.code==200){
			this.group=res.data;
		}
		const userInfo=uni.getStorageSync('userInfo');
		this.userInfo=userInfo;
	},
	methods:{
		onImageError(e){
			uni.showToast({
				title:e.msg,
				icon:"none"
			})
		},
		beforeUpload(){
			uni.showLoading({
				title:"上传中",
				icon:"none",
				mask:true
			})
		},
		//视频上传成功
		uploadData(e){
			this.uploadVideo=e;
			console.log(e);
		},
		confirm(e){
			this.okGroup=e;
		},
		changeGroup(){
			this.show=!this.show;
		},
		addAddress(e){
			var that = this;
			uni.chooseLocation({
			    success: function (res) {
					that.address=res.name;
					that.location=res.longitude+','+res.latitude;
			    }
			});
		},
		uploadSuccess(e){
			this.fileList.push(e.data.src);
			uni.hideLoading();
		},
		cunstomback(){
			uni.reLaunch({
				url:"../home/index"
			})
		},
		async clickBtn(e){
			if(this.form.content.length<1){
				uni.showToast({
					title:"说点什么在发吧",
					icon:'none'
				})
				return;
			}
			if(this.type=='image'){
				const images=this.fileList.join(',');
				var data= {
					communityContent:this.form.content,
					images:images,
					video:null,
					group_id:this.group[this.okGroup].Id,
					address:this.address,
					location:this.location,
					isTop:this.form.checked
				}
				var res = await Community.sendContent(data);
				if(res.code==200){
					uni.showToast({
						title:res.msg
					})
					setTimeout(()=>{
						uni.reLaunch({
							url:'../home/index'
						})
					},1000)
				}
			}else{
				var data= {
					communityContent:this.form.content,
					images:null,
					video:this.uploadVideo!=''?this.uploadVideo.video:null,
					group_id:this.group[this.okGroup].Id,
					address:this.address,
					location:this.location,
					isTop:this.form.checked
				}
				var res = await Community.sendContent(data);
				if(res.code==200){
					uni.showToast({
						title:res.msg
					})
					setTimeout(()=>{
						uni.reLaunch({
							url:'../home/index'
						})
					},1000)
				}
			}
			
		}
	}
};
</script>

<style lang="scss">
</style>
