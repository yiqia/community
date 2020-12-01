<?php /*a:2:{s:72:"D:\phpstudy_pro\WWW\community\application\admin\view\user\user_pass.html";i:1601631119;s:71:"D:\phpstudy_pro\WWW\community\application\admin\view\public\header.html";i:1601212227;}*/ ?>
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

	<body class="layui-layout-body">
		<div class="layui-fluid">
			<div class="layui-row layui-col-space20">
				<div class="layui-col-md3">
				</div>
				<div class="layui-col-md6">
					<div class="layui-card">
						<div class="layui-card-header">用户修改</div>
						<div class="layui-card-body">
							<form class="layui-form" action="" lay-filter="component-form-element">
                                <div class="layui-row layui-col-space10 layui-form-item">
                                    <div class="layui-col-lg6">
                                        <label class="layui-form-label">密码：</label>
                                        <div class="layui-input-block">
                                            <input type="text" name="password" lay-verify="required" id="userPass"   autocomplete="off" class="layui-input">
                                        </div>
                                    </div>
                                </div>
								<div class="layui-form-item">
									<div class="layui-input-block">
										<button class="layui-btn" lay-submit lay-filter="component-form-element">立即提交</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="layui-col-md6">
				</div>
			</div>
		</div>
		<script src="/layuiadmin/layui/layui.js"></script>
		<script>
			layui.config({
				base: '../../../layuiadmin/' //静态资源所在路径
			}).extend({
				index: 'lib/index' //主入口模块
			}).use(['index', 'form'], function() {
				var $ = layui.$,
					admin = layui.admin,
					element = layui.element,
					setter = layui.setter,
					form = layui.form;
				var user=localStorage.getItem("session");
				form.render(null, 'component-form-element');
				element.render('breadcrumb', 'breadcrumb');
                const userItem = JSON.parse(sessionStorage.getItem('userItem'));
                $('#userId').val(userItem.Id)
                $('#userEmail').val(userItem.email)
                $('#userName').val(userItem.username)
				form.on('submit(component-form-element)', function(data) {
					//layer.msg(JSON.stringify(data.field));
					var d=data.field
					$.ajax({
						type: 'post',
						url: setter.api + '/admin/user/editPass',
						data: d,
						success: function(res) {
							if (res.code == 200) {
								layer.msg('修改成功', {
									offset: '15px',
									icon: 1,
									time: 1000
								});
							} else {
								layer.msg('修改失败', {
									offset: '15px',
									icon: 2
								})
							}
						}
					});
					
					
					return false;
				});
			});
		</script>
	</body>

</html>