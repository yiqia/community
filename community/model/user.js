import {Http} from "../utils/http";
import {config} from "../config/config";
// 一奇开源 QQ330729121
class User{
    static async login(username,password){
        const login = await Http.request({
            url:'/v1/user/login',
			data:{
				username,
				password
			},
			method:'POST'
        })
		if(!login.errorCode){
			if(config.compress){
				login.data.userInfo.avatar=login.data.userInfo.avatar+config.headerCompressRule;
			}
			uni.setStorageSync('userInfo',login.data.userInfo);
			uni.setStorageSync('token',login.data.token);
			uni.showToast({
				title:"登录成功"
			})
			return true;
		}else{
			uni.showToast({
				title:login.msg,
				icon:"none"
			})
		}
		return false;
    }
	static async regUser(username,email,password,repassword){
	    const reg = await Http.request({
	        url:'/v1/user/regUser',
			data:{
				username,
				password,
				email,
				repassword
			},
			method:'POST'
	    })
		if(!reg.errorCode){
			uni.showToast({
				title:"注册成功"
			})
			return true;
		}else{
			uni.showToast({
				title:reg.msg,
				icon:"none"
			})
		}
		return false;
	}
	static async uploadHeader(file){
		return await Http.upload({
			url:'v1/user/uploadHeader', 
			file:file
		})
	}
	static async updateName(name){
		return await Http.tSend({
			url:'v1/user/updateName',
			data:{
				name:name
			},
			method:"POST"
		})
	}
	static compressImage(image){
		if(config.compress){
			return image+config.headerCompressRule;
		}
	}
	static async changePassword(data){
		return await Http.tSend({
			url:'v1/user/changePassword',
			data,
			method:"POST"
		})
	}
	static async sendFeedback(data){
		return await Http.tSend({
			url:'v1/user/sendFeedback',
			data,
			method:"POST"
		})
	}
}
export {
    User
}