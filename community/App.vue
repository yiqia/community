<script>
	import Vue from 'vue'
	export default {
		// 此处globalData为了演示其作用，不是uView框架的一部分
		globalData: {
			username: '白居易'
		},
		
		onLaunch() {
			// 1.1.0版本之前关于http拦截器代码，已平滑移动到/common/http.interceptor.js中
			// 注意，需要在/main.js中实例化Vue之后引入如下(详见文档说明)：
			// import httpInterceptor from '@/common/http.interceptor.js'
			// Vue.use(httpInterceptor, app)
			Vue.prototype.ColorList = [{
					title: '嫣红',
					name: 'red',
					color: '#e54d42'
				},
				{
					title: '桔橙',
					name: 'orange',
					color: '#f37b1d'
				},
				{
					title: '明黄',
					name: 'yellow',
					color: '#fbbd08'
				},
				{
					title: '橄榄',
					name: 'olive',
					color: '#8dc63f'
				},
				{
					title: '森绿',
					name: 'green',
					color: '#39b54a'
				},
				{
					title: '天青',
					name: 'cyan',
					color: '#1cbbb4'
				},
				{
					title: '海蓝',
					name: 'blue',
					color: '#0081ff'
				},
				{
					title: '姹紫',
					name: 'purple',
					color: '#6739b6'
				},
				{
					title: '木槿',
					name: 'mauve',
					color: '#9c26b0'
				},
				{
					title: '桃粉',
					name: 'pink',
					color: '#e03997'
				},
				{
					title: '棕褐',
					name: 'brown',
					color: '#a5673f'
				},
				{
					title: '玄灰',
					name: 'grey',
					color: '#8799a3'
				},
				{
					title: '草灰',
					name: 'gray',
					color: '#aaaaaa'
				},
				{
					title: '墨黑',
					name: 'black',
					color: '#333333'
				},
				{
					title: '雅白',
					name: 'white',
					color: '#ffffff'
				},
			]
			
		},
	}
</script>

<style lang="scss">
	@import "uview-ui/index.scss";
	@import "common/demo.scss";
	@import  "common/css/iconfont.css";
	$color:#5466ff;
	/*每个页面公共css */
	.Limit{
		width: 709rpx;
		height: 100%;
		margin: 0 auto;
	}
	.flexCenter{
		display: flex;
		justify-content: center;
		align-items: center;
	}
	.hover-class{
	    position: relative;
	    top: 3rpx;
	    left: 3rpx;
	    box-shadow: 0px 0px 8px rgba(0,0,0,.1) inset;
	}
	.small-hover{
	    opacity: 0.9;
	    transform: scale(0.95,0.95);
	}
	.medium-hover{
	    opacity: 0.8;
	    transform: scale(0.85,0.85);
	}
	.box-shadow-white{
		box-shadow:1px 1px 13px rgba($color: #999999, $alpha: 0.3);
	}
</style>