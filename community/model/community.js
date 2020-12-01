import {Http} from "../utils/http";
import {Paging} from "../utils/paging";
import {config} from "../config/config";

class Community{
	static async getContent(group=''){
		if(group==''){
			var paging= new Paging({url:'v1/content/getContentData'});
		}else{
			var paging= new Paging({url:`v1/content/getContentData?group_id=${group}`});
		}
		console.log(group)
		return paging;
	}
	static makeImages(data){
		data.forEach((item)=>{
			//是否开启图片压缩
			if(config.compress){
				if(item.avatar)item.avatar+=config.headerCompressRule;
				if(item.images){
					var imgArray=item.images.split(',');
					var okimg=[];
					imgArray.forEach((i)=>{
						okimg.push(i+=config.comunityCompressRule);
					})
					item.images=okimg;
				}
			}else{
				if(item.images) item.images=item.images.split(',');
			}
		})
		return data;
	}
	//点赞
	static async sendGood(id){
		return await Http.tSend({
			url:`v1/content/sendGood?Id=${id}`,
		})
	}
	//收藏
	static async sendCollection(id){
		return await Http.tSend({
			url:`v1/content/sendCollection?Id=${id}`,
		})
	}
	//关注
	static async sendFollow(id){
		return await Http.tSend({
			url:`v1/content/sendFollow?Id=${id}`,
		})
	}
	//评论
	static async senComment(item){
		if(item.comment_user_id){
			return await Http.tSend({
				url:`v1/content/sendCommentTwo`,
				data:{
					Id:item.comment_user_id,
					content:item.content
				},
				method:"POST"
			})
		}else{
			return await Http.tSend({
				url:`v1/content/sendComment`,
				data:{
					Id:item.community_id,
					content:item.content
				},
				method:"POST"
			})
		}
		
	}
	//获取评论
	static async getComment(id){
		const paging= new Paging({url:`v1/content/getComment?Id=${id}`});
		const data=await paging._actualGetData();
		return data;
	}
	//发送评论点赞
	static async sendCommentGood(id){
		return await Http.tSend({
			url:`v1/content/sendCommentGood?Id=${id}`, 
		})
	}
	//发送二级评论点赞
	static async sendCommentTwoGood(id){
		return await Http.tSend({
			url:`v1/content/sendCommentTwoGood?Id=${id}`, 
		})
	}
	//获取圈子类别
	static async getCommunityGroup(){
		return await Http.request({
			url:`v1/content/getCommunityType`, 
		})
	}
	//发送动态
	static async sendContent(data){
		return await Http.tSend({
			url:`v1/content/sendContent`, 
			data:data,
			method:"POST"
		})
	}
	//上传文件
	static async uploadFile(file){
		return await Http.upload({
			url:`v1/file/uploadFile`, 
			file:file
		})
	}
	//获取动态详细信息
	static async getCommunityInfo(id){
		var res = await Http.send({
			url:`v1/content/getCommunityInfo?Id=${id}`
		})
		var info =Community.makeImages([res.data]);
		res.data=info[0];
		return res;
	}
	//获取动态评论
	static async getCommunityComment(id){
		const paging= new Paging({url:`v1/content/getComment?Id=${id}`});
		return paging;
	}
	//发送举报信息
	static async sendReport(id){
		return await Http.send({
			url:`v1/content/sendReport?Id=${id}`
		})
	}
	//获取我的关注
	static async getMyFollow(){
		const paging= new Paging({url:"v1/content/getMyFollow"});
		return paging;
	}
	//获取最火
	static async getCommunityFire(){
		const paging= new Paging({url:"v1/content/getCommunityFire"});
		return paging;
	}
	//删除动态
	static async removeCommunity(id){
		return await Http.tSend({
			url:`v1/content/removeCommunity?Id=${id}`
		})
	}
	//获取用户的动态
	static async getUserCommunity(Id=''){
		if(Id==''){
			uni.showToast({
				title:"用户参数错误",
				icon:'none'
			})
			return ;
		}
		var paging= new Paging({url:`v1/content/getUserCommunity?Id=${Id}`});
		return paging;
	}
	//获取用户收藏的动态
	static async myCollection(){
		var paging= new Paging({url:'v1/content/myCollection'});
		return paging;
	}
	static async getUserCommunityIndex(Id=''){
		if(Id==''){
			uni.showToast({
				title:"用户参数错误",
				icon:'none'
			})
			return ;
		}
		return await Http.request({
			url:`v1/content/getUserCommunityIndex?Id=${Id}`
		})
	}
	static async searchAll(e){
		var paging= new Paging({url:'v1/content/searchAll?searchValue='+e});
		return paging;
	}
	static async getSearchHot(){
		return await Http.send({
			url:'v1/content/getHotSearch'
		})
	}
}
export {
	Community
}