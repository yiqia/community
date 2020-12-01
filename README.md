
<h3 align="center">社区</h3>


## 说明

基于thinkphp5.1+uniapp+mysql5.7 开发的社区程序，主要兼容H5版本。

图片压缩使用的七牛云存储。

后台管理系统并未完善，后期有时间完善或自行完善。

主要功能：

1. 发布动态（文字内容，图片或视频，地点，类别）

2. 首页展示
3. 点赞 收藏 评论 二级评论 点赞
4. 关注 删除 举报
5. 查看用户资料和用户的发布
6. 查看我的发布
7. 查看我的收藏
8. 设置
9. 修改个人资料
10. 登录账号 注册账号
11. 搜索动态
12. 暂时想到这么多

## 演示

示例地址：http://py.q05.cc/app/#/

![image-20201201205233426](https://i.loli.net/2020/12/01/592qDXuopFLVOIN.png)

## 技术

后端程序采用MVC的设计模式

![image-20201201205150087](https://i.loli.net/2020/12/01/yHctFophfsSlkvW.png)



前端基于uniapp并使用uview-ui框架开发

## 搭建

### 修改后端代码

/config/database.php

```php
    'hostname'        => '',
    // 数据库名
    'database'        => '',
    // 用户名
    'username'        => '',
    // 密码
    'password'        => '',
    // 端口
    'hostport'        => '',
```

如何部署服务器thinkphp项目自行百度吧

### 修改前端代码

/config/config.js

```js
apiBaseUrl:"http://py.q05.cc/api/",
```

修改成自己的域名

打开HbuilderX工具（没有自行百度下载），导入前端源码目录，顶部导航选择发行-网站

![image-20201201212019512](C:\Users\33072\AppData\Roaming\Typora\typora-user-images\image-20201201212019512.png)

发行完成后将该目录文件放到后端thinkphp项目下的public/app文件夹里

然后就能看到部署成功了

## 赞赏

开源不易，给个赞赏支持一下吧！

<img src="C:\Users\33072\AppData\Roaming\Typora\typora-user-images\image-20201201212427110.png" alt="image-20201201212427110" style="zoom:50%;" />



<img src="https://i.loli.net/2020/12/01/9GRxOWNQEyPzt1Z.png" alt="image-20201201212439205" style="zoom:25%;" />