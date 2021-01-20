<template>
	<view id="all" style="background-color: #fff  ;">
		<view class="allLimit">
			<view class="header">
				<view class="headerBox"><image src="../../static/images/index.png" mode=""></image></view>
			</view>
			<form @submit="sendLogin">
				<view class="content">
					<text class="contentTitle">{{ isLogin ? '登录' : '注册' }}</text>
					<input type="text" name="user" value="" placeholder="用户名" />
					<input type="password" name="pass" value="" placeholder="密码" />
					<input type="password" name="okpass" value="" placeholder="确认密码" v-if="!isLogin" />
					<input type="text" name="qq" value="" placeholder="qq号码" v-if="!isLogin" />
					<input type="text" name="email" value="" placeholder="邮箱" v-if="!isLogin" />
					<text class="loginText" @click="isLogin ? goRegister() : goLogin()">{{ isLogin ? '没有账号点我注册' : '已有账号点我登录' }}</text>
				</view>
				<view class="bottom">
					<button form-type="submit">{{ isLogin ? 'Sign In' : 'Sign Up' }}</button>
				</view>
			</form>
		</view>
	</view>
</template>

<script>
import {User} from '../../model/user.js'
export default {
	data() {
		return {
			isLogin:true
		}
	},
	methods:{
		goLogin:function(){
			this.isLogin=true;
		},
		goRegister:function(){
			this.isLogin=false;
		},
		sendLogin:async function(e){
			var data=e.mp.detail.value;
			var url ="";
			var that = this;
			console.log(data);
			if(data.user=="" || data.user==undefined || data.pass=="" || data.pass==undefined){
				uni.showToast({
					title:'信息不能为空',
					icon:"none"
				})
				return 0;
			}else if(data['user'].length<2 || data['user'].length>=30){
				uni.showTabBar({
					title:"用户名长度再2-30之间",
					icon:'none'
				})
				return 0;
			}
			if(this.isLogin){
				const login=await User.login(data.user,data.pass);
				if(login){
					setTimeout(()=>{
						uni.reLaunch({
							url:"./my"
						})
					},1000)
				}
			}else{
				const reg=await User.regUser(data.user,data.email,data.pass,data.okpass,data.qq);
				if(reg){
					this.isLogin=true;
				}
			}
		},
		sendRegister:function(){

		}
	},
	onLoad(e) {


	}
	}
</script>

<style>
.allLimit {
	width: 75%;
	margin: 0 auto;
}
.header {
	width: 100%;
	height: 50vw;
	background-color: #fff;
	display: flex;
	justify-content: center;
}

.headerBox {
	width: 30vw;
	height: 30vw;
	box-shadow: 5px 5px 28px 11px rgba(200, 200, 200, 0.2);
	margin-top: 5vw;
	border-radius: 4vw;
	display: flex;
	justify-content: center;
	align-items: center;
}

.headerBox image {
	width: 15vw;
	height: 15vw;
}

.content {
	width: 100%;
}

.contentTitle {
	font-size: 7vw;
	font-weight: bold;
}
.loginText {
	display: block;
	text-align: center;
	color: #9f9f9f;
}
.content input {
	width: 100%;
	height: 15vw;
	background-color: #f7f7f7;
	margin: 5vw 0;
	text-indent: 10vw;
	border-radius: 7.5vw;
}
.bottom {
	width: 100%;
	height: 35vw;
	display: flex;
	justify-content: center;
	align-items: center;
}
.bottom button {
	margin: 0 auto;
	width: 70%;
	height: 15vw;
	background-color: #fbbd08;
	border-radius: 7.5vw;
	display: flex;
	justify-content: center;
	align-items: center;
	color: #fff;
	font-weight: bold;
	box-shadow: 9px 5px 28px 3px rgba(255, 190, 0, 0.46);
}
</style>
