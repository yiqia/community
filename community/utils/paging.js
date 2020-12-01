/*
    作者:一奇
    qq：330729121
*/
import {Http} from "./http"
class Paging{
  page;
  req;
  url;
  locker=false;
  moreData=true;
  accoumulator=[];
  //构造函数
  constructor(req,page=1){
    this.req=req;
    this.page=page;
    this.url=req.url;
  }
  //获取更多数据
  async getMoreData(){
    if(!this._getLocker()){
      return
    }
    if(this.moreData){
      const data=await this._actualGetData();
      this._releseLocker();
      return data;
    }
    return;
  }
  async _actualGetData(){
    let req = this._getCurrentReq();
    let paging=await Http.send(req);
    if(!paging){
      return null;
    }
    if(paging.errorCode==10004||paging.errorCode==10005 ||paging.errorCode==10006|| paging.data.length==0){
      this.moreData=false;
	  uni.showToast({
	  	title:paging.msg,
		icon:"none"
	  })
      return {
        empty:true,
        moreData:false,
        items:[],
        accoumulator:[]
      }
    }
    if(this.moreData){
      this.page+=1;
    }
    this._accumulate(paging.data)
    return {
      empty:false,
      items:paging.data,
      moreData:this.moreData,
      accoumulator:this.accoumulator
    }
  }
  //累加数据
  _accumulate(items){
    this.accoumulator=this.accoumulator.concat(items);
  }
  //查看是否有更多的数据
  static _moreData(total_page,page){
    return page<total_page-1;
  }
  //获取请求连接
  _getCurrentReq(){
    let url = this.url;
    const params=`page=${this.page}`;
    if(url.indexOf('?')==-1){
      url=this.url+'?'+params;
    }else{
      url=this.url+'&'+params;
    }
    this.req.url=url;
    return this.req;
  }
  //构建锁
  _getLocker(){
    if(this.locker){
      return false;
    }
    this.locker=true;
    return true;
  }
  //重置锁
  _releseLocker(){
    this.locker=false;
  }
}
export{
  Paging
}