<?php /*a:2:{s:69:"D:\phpstudy_pro\WWW\community\application\admin\view\login\login.html";i:1600951560;s:71:"D:\phpstudy_pro\WWW\community\application\admin\view\public\header.html";i:1601212227;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>社区管理平台</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="/layuiadmin/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="/layuiadmin/style/admin.css" media="all">
    <link rel="stylesheet" href="/layuiadmin/style/login.css" media="all">
    <script type="text/javascript">
        // if(sessionStorage.getItem("session")=="" ||sessionStorage.getItem("session")==undefined){
        //     location.href = './user/login.html'; //后台主页
        // }
    </script>
    <script>
        /^http(s*):\/\//.test(location.href) || alert('请先部署到 localhost 下再访问');
    </script>
</head>
	<body>

		<div class="layadmin-user-login layadmin-user-display-show" id="LAY-user-login" style="display: none;">

			<div class="layadmin-user-login-main">
				<div class="layadmin-user-login-box layadmin-user-login-header">
					<h2>社区管理系统</h2>
					<p>Hello</p>
				</div>
				<div class="layadmin-user-login-box layadmin-user-login-body layui-form">
					<div class="layui-form-item">
						<label class="layadmin-user-login-icon layui-icon layui-icon-username" for="LAY-user-login-username"></label>
						<input type="text" name="name" id="LAY-user-login-username" lay-verify="required" placeholder="用户名" class="layui-input">
					</div>
					<div class="layui-form-item">
						<label class="layadmin-user-login-icon layui-icon layui-icon-password" for="LAY-user-login-password"></label>
						<input type="password" name="password" id="LAY-user-login-password" lay-verify="required" placeholder="密码" class="layui-input">
					</div>
					<div class="layui-form-item">
						<button class="layui-btn layui-btn-fluid" lay-submit lay-filter="LAY-user-login-submit">登 入</button>
					</div>
				</div>
			</div>

			<div class="layui-trans layadmin-user-login-footer">

				<p>© 2020 <a href="http://www.baidu.com/" target="_blank"></a></p>
				<p>
					<span><a href="http://www.baidu.com/" target="_blank">社区管理系统</a></span>
				</p>
			</div>

			<!--<div class="ladmin-user-login-theme">
      <script type="text/html" template>
        <ul>
          <li data-theme=""><img src="{{ layui.setter.base }}style/res/bg-none.jpg"></li>
          <li data-theme="#03152A" style="background-color: #03152A;"></li>
          <li data-theme="#2E241B" style="background-color: #2E241B;"></li>
          <li data-theme="#50314F" style="background-color: #50314F;"></li>
          <li data-theme="#344058" style="background-color: #344058;"></li>
          <li data-theme="#20222A" style="background-color: #20222A;"></li>
        </ul>
      </script>
    </div>-->

		</div>

		<script src="/layuiadmin/layui/layui.js"></script>
		<script>
			layui.config({
				base: '/layuiadmin/' //静态资源所在路径
			}).extend({
				index: 'lib/index' //主入口模块
			}).use(['index', 'user', 'jquery'], function() {
				var $ = layui.$,
					setter = layui.setter,
					admin = layui.admin,
					form = layui.form,
					router = layui.router(),
					search = router.search,
					jquery = layui.jquery;
				form.render();
				//提交
				form.on('submit(LAY-user-login-submit)', function(obj) {
					//var data=JSON.stringify(obj.field)

					//console.log(obj.field)
					$.post({
						url: setter.api + 'admin/login/login',
						data: obj.field,
						success:function (res) {
							console.log(res);
							if(res.code==200){
								sessionStorage.setItem('token',res.data.token);
								layer.msg('登入成功', {
									offset: '15px',
									icon: 1,
									time: 1000
								}, function() {
									location.href = '../index/index'; //后台主页
								});
							}else {
									layer.msg(res.msg, {
										offset: '15px',
										icon: 2
									})
							}
						}
					});
				});

			});
		</script>
	</body>
</html>
