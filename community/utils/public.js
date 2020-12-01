function getTime(){
	var time = new Date();
	// time.getYear(); //获取当前年份
	// time.getFullYear(); //获取完整的年份(4位,1970-???)
	// time.getMonth(); //获取当前月份(0-11,0代表1月)
	// time.getDate(); //获取当前日(1-31)
	// time.getDay(); //获取当前星期X(0-6,0代表星期天)
	// time.getTime(); //获取当前时间(从1970.1.1开始的毫秒数)
	// time.getHours(); //获取当前小时数(0-23)
	// time.getMinutes(); //获取当前分钟数(0-59)
	// time.getSeconds(); //获取当前秒数(0-59)
	// time.getMilliseconds(); //获取当前毫秒数(0-999)
	// time.toLocaleDateString(); //获取当前日期
	// time.toLocaleTimeString(); //获取当前时间
	// time.toLocaleString( ); //获取日期与时间
	return  time.getFullYear()+'-'+(time.getMonth()<10?'0'+time.getMonth():time.getMonth())+'-'+
			(time.getDate()<10?'0'+time.getDate():time.getDate())+' '+
			(time.getHours()<10?'0'+time.getHours():time.getHours())+':'+
			(time.getMinutes()<10?'0'+time.getMinutes():time.getMinutes())+':'+
			(time.getSeconds()<10?'0'+time.getSeconds():time.getSeconds());
}

export{
	getTime
}