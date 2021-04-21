const config={
	//apiBaseUrl:"http://py.q05.cc/api/",
	//apiBaseUrl:"http://www.community.com/api/",
	apiBaseUrl:"http://py.q05.cc/api/",
	apimockUrl:"https://easydoc.xyz/mock/TZTqnemi/api/",
    compress:true,   //是否开启图片压缩，仅限七牛云存储图片压缩
    comunityCompressRule:"?imageView2/2/w/340/h/340/q/50|imageslim"     ,//社区图片七牛云压缩规则
	headerCompressRule:"?imageView2/2/w/100/h/100/q/50|imageslim"     //社区图片七牛云压缩规则
}
export {
    config
}