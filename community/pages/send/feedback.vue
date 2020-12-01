<template>
	<view>
		<header-title 
			title="欢迎反馈问题和意见"
			:isPoint="true"
			pointColor="#5466ff"
			:isBtn="true"
			btnText="提交"
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
					upload-text="选择图片" 
					:max-count="9"
					:limitType="limitType"
					@on-success="uploadSuccess"
					:before-upload="beforeUpload"
					@on-error="onImageError"
					:show-tips="false"
					></u-upload>
				<u-cell-group>
					<u-cell-item icon="qq-fill" title="联系方式" :arrow="false">		
						<u-input v-model="form.contact" type="text" :border="false" input-align="right" slot="right-icon" placeholder="方便我们联系你哦"/>
					</u-cell-item>
				
				</u-cell-group>
		</view>
	</view>
</template>

<script>
import {config} from "../../config/config";
import {User} from "../../model/user.js";
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
			group:[]
		};
	},
	components:{
		headerTitle
	},
	onLoad(e) {

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
		uploadSuccess(e){
			this.fileList.push(e.data.src);
			uni.hideLoading();
		},
		async clickBtn(e){
			if(this.form.content.length<1){
				uni.showToast({
					title:"说点什么在发吧",
					icon:'none'
				})
				return;
			}
			
			const images=this.fileList.join(',');
			var data= {
				content:this.form.content,
				images:images?images:'',
				contact:this.form.contact?this.form.contact:'',
			}
			var res = await User.sendFeedback(data);
			if(res.code==200){
				uni.showToast({
					title:res.msg
				})
				setTimeout(()=>{
					uni.reLaunch({
						url:'../my/set'
					})
				},1000)
			}
			
		}
	}
};
</script>

<style lang="scss">
</style>
