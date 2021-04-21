import {config} from "../config/config";
import {promisic} from "../utils/util";

class Http{
    static async request({url,data,method='GET'}){
        return (await promisic(wx.request)({
            url:`${config.apiBaseUrl}${url}`,
            data,
            method,
            header:{
                'Content-Type':'application/json; charset=utf-8'
            }
        })).data
    }
    //必须携带token的请求
    static async tSend({url,data,method='GET'}){
        const token = uni.getStorageSync('token');
        if(!token){
            uni.showToast({
                title: '需要登录账号',
                icon: "none"
            })
            setTimeout(() => {
                uni.navigateTo({
                    url: '/paegs/my/login',
                })
            }, 1000)
           return false;
        }
        var res=(await promisic(wx.request)({
            url:`${config.apiBaseUrl}${url}`,
            data,
            method,
            header:{
                'Content-Type':'application/json; charset=utf-8',
                'token': token
            }
        })).data;
        if(res.errCode==10005||res.errCode==10006){
            uni.showToast({
                title:res.msg,
                icon:"none"
            })
            setTimeout(() => {
                uni.navigateTo({
                    url: '/paegs/my/login',
                })
            }, 1000)
            return false;
        }
        if(res.code!==200){
            uni.showToast({
                title:res.msg,
                icon:"none"
            })
        }
        return res;
    }
    //不一定携带token的请求
    static async send({url,data,method='GET'}){
        const token = uni.getStorageSync('token');
        var header="";
        if(token){
           header= {
               'Content-Type': 'application/json; charset=utf-8',
               'token':token
           }
        }else{
            header= {
                'Content-Type': 'application/json; charset=utf-8'
            }
        }
        return (await promisic(wx.request)({
            url:`${config.apiBaseUrl}${url}`,
            data,
            method,
            header
        })).data
    }
	static async mocksend({url,data,method='GET'}){
	    const token = uni.getStorageSync('token');
	    var header="";
	    if(token){
	       header= {
	           'Content-Type': 'application/json; charset=utf-8',
	           'token':token
	       }
	    }else{
	        header= {
	            'Content-Type': 'application/json; charset=utf-8'
	        }
	    }
	    return (await promisic(wx.request)({
	        url:`${config.apimockUrl}${url}`,
	        data,
	        method,
	        header
	    })).data
	}
	/*上传文件封装，{请求地址 文件临时地址，请求头，请求参数} */
	static async upload({url,file,data}){
		const token = uni.getStorageSync('token');
		if(!token){
		    uni.showToast({
		        title: '需要登录账号',
		        icon: "none"
		    })
		    setTimeout(() => {
		        uni.navigateTo({
		            url: '/paegs/my/login',
		        })
		    }, 1000)
		   return ;
		}
		return new Promise((res,error)=>{
			uni.uploadFile({
				url: `${config.apiBaseUrl}${url}`, //仅为示例，非真实的接口地址
				filePath:file,
				name: 'file',
				header:{
				    'token': token
				},
				formData: data,
				success: (uploadFileRes) => {
					res(uploadFileRes);
				}
			});
		})
	}
}
export {
    Http
}