<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

//不需要登录账号的接口
Route::group('admin/',function (){
    Route::get('login/login','admin/login/login');
    Route::post('login/login','admin/login/login');
});
Route::group('admin/',function (){
    Route::get('index/index','admin/index/index');
})->middleware("AdminUserAuth");


//不需要登录账号的接口
Route::group('api/:version/',function (){
    Route::get('user/index','api/:version.user/index');
    Route::post('user/login','api/:version.user/login');
    Route::post('user/regUser','api/:version.user/regUser');
    Route::get('content/getContentData','api/:version.content/getContentData');
    Route::get('content/getCommunityInfo','api/:version.content/getCommunityInfo');
    Route::get('content/getCommunityFire','api/:version.content/getCommunityFire');
    Route::get('content/getComment','api/:version.content/getComment');
    Route::get('content/getCommentTwo','api/:version.content/getCommentTwo');
    Route::get('content/getCommunityType','api/:version.content/getCommunityType');
    Route::get('content/getUserCommunity','api/:version.content/getUserCommunity');
    Route::get('content/getUserCommunityIndex','api/:version.content/getUserCommunityIndex');
    Route::get('content/addVisitorNumber','api/:version.content/addVisitorNumber');
    Route::get('content/getCommunityTop','api/:version.content/getCommunityTop');
    Route::get('content/searchAll','api/:version.content/searchAll');
    Route::get('content/getHotSearch','api/:version.content/getHotSearch');
});

//需要登录账号的接口
Route::group('api/:version/',function (){
    Route::post('content/sendContent','api/:version.content/sendContent');
    Route::post('file/uploadFile','api/:version.file/uploadFile');
    Route::get('content/getMyFollow','api/:version.content/getMyFollow');
    Route::post('content/sendCommentTwo','api/:version.content/sendCommentTwo');
    Route::get('content/sendCommentGood','api/:version.content/sendCommentGood');
    Route::get('content/sendCommentTwoGood','api/:version.content/sendCommentTwoGood');
    Route::get('content/removeCommunity','api/:version.content/removeCommunity');
    Route::get('content/myCollection','api/:version.content/myCollection');
    Route::post('user/uploadHeader','api/:version.user/uploadHeader');
    Route::post('user/updateName','api/:version.user/updateName');
    Route::post('user/changePassword','api/:version.user/changePassword');
    Route::post('user/sendFeedback','api/:version.user/sendFeedback');
    Route::get('content/closeTop','api/:version.content/closeTop');

})->middleware("ApiUserAuth");


//需要登录账号并且新增访问量的接口
Route::group('api/:version/',function (){
    Route::get('content/sendGood','api/:version.content/sendGood');
    Route::get('content/sendReport','api/:version.content/sendReport');
    Route::get('content/sendCollection','api/:version.content/sendCollection');
    Route::post('content/sendComment','api/:version.content/sendComment');
    Route::get('content/sendFollow','api/:version.content/sendFollow');
})->middleware("ApiUserAuth")->middleware("ApiCommunityAuth");