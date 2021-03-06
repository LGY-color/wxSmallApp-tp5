<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

use think\Route;

// +----------------------------------------------------------------------
// | get read
// +----------------------------------------------------------------------
//小程序首页
Route::get('api/:version/index','api/:version.Index/index');
//分类页面
Route::get('api/:version/bitem','api/:version.Item/getBigItem');
//获取大分类下的子分类
Route::get('api/:version/sitem','api/:version.Item/getSmallItem');
//大分类下的子分类 包括筛选条件
Route::get('api/:version/sitem/:id','api/:version.Item/getFilterItem');
//根据分类id获取具体的子分类下的条件
Route::get('api/:version/item/getItemByName/:id','api/:version.Item/getItemByName');

//根据筛选条件获取数据
Route::get('api/:version/info/:id','api/:version.Info/getConditionInfo');
//根据筛选条件获取数据 中文get会转码
Route::post('api/:version/info/getInfo','api/:version.Info/getConditionInfo');
//根据id 进入详情
Route::get('api/:version/info/getIdInfo/:id','api/:version.Info/getIdInfo');
//根据id 进入详情 主要是修改信息用的 带用户 不带评论
Route::get('api/:version/info/getInfoById/:id','api/:version.Info/getInfoById');
//获取用户已发布的信息
Route::get('api/:version/info/getPublish/:page','api/:version.Info/getPublish');

//根据分类id获取信息
Route::get('api/:version/info/getInfoByItem/:id','api/:version.Info/getInfoByItem');
//根据筛选条件获取信息
Route::post('api/:version/info/getConditionInfo','api/:version.Info/getConditionInfo');
//获取更多置顶信息
Route::get('api/:version/info/getMoreTop/:page','api/:version.Info/getMoreTop');
//获取更多星级信息
Route::get('api/:version/info/getMoreStar/:page','api/:version.Info/getMoreStar');
//获取更多最新信息
Route::get('api/:version/info/getMoreNew/:page','api/:version.Info/getMoreNew');
//获取更多小吃盘店信息
Route::get('api/:version/info/getMoreXcpd/:page','api/:version.Info/getMoreXcpd');
//获取更多招工求职信息
Route::get('api/:version/info/getMoreZgqz/:page','api/:version.Info/getMoreZgqz');
//获取更多店面承包信息
Route::get('api/:version/info/getMoreDmcb/:page','api/:version.Info/getMoreDmcb');
//获取更多二手市场信息
Route::get('api/:version/info/getMoreEssc/:page','api/:version.Info/getMoreEssc');

//设置 置顶 套红 加粗
Route::post('api/:version/level/setLevelStatus','api/:version.Level/setLevelStatus');
//用户刷新
Route::get('api/:version/info/setRefresh/:id','api/:version.Info/setRefresh');
//用户微信推广
Route::get('api/:version/info/setWeixin/:id','api/:version.Info/setWeixin');
//用户设置已成交
Route::get('api/:version/info/setDeal/:id','api/:version.Info/setDeal');

//用户评论
Route::post('api/:version/comment/infoReply','api/:version.Comment/infoReply');
//查看info_id 用户是否收藏
Route::get('api/:version/collection/infoCollection/:id','api/:version.Collection/infoCollection');
//用户收藏行为
Route::post('api/:version/collection/collectionInfo','api/:version.Collection/collectionInfo');
//获取用户已收藏信息
Route::get('api/:version/collection/getUserCollection','api/:version.Collection/getUserCollection');

//获取用户信息
Route::get('api/:version/user/getUserInfo','api/:version.User/getUserInfo');
//更新用户信息
Route::post('api/:version/user/updateUser','api/:version.User/updateUser');
//用户解锁
Route::get('api/:version/user/toUnlock','api/:version.User/toUnlock');
//获取用户评论信息
Route::get('api/:version/comment/getUserComment','api/:version.Comment/getUserComment');
//获取用户未读消息数
Route::get('api/:version/comment/getNoReadNum','api/:version.Comment/getNoReadNum');
//获取用户消息数
Route::get('api/:version/comment/getUserNews','api/:version.Comment/getUserNews');
// +----------------------------------------------------------------------
// | 微信支付
// +----------------------------------------------------------------------
//用户充值
Route::post('api/:version/pay/PreOrder','api/:version.Pay/getPreOrder');
Route::post('api/:version/pay/notify','api/:version.Pay/receiveNotify');
// +----------------------------------------------------------------------
// | post create update 暂定不用put
// +----------------------------------------------------------------------
//插入数据 到info表
Route::post('api/:version/info/InsertInfo','api/:version.Info/InsertInfo');
//更新数据 到info表
Route::post('api/:version/info/UpdateInfo','api/:version.Info/UpdateInfo');
//用code换取openid ==
Route::post('api/:version/token/user','api/:version.Token/getToken');
//验证token
Route::post('api/:version/token/verify','api/:version.Token/verifyToken');
//获取七牛云 token
Route::get('api/:version/base/getQiniuToken','api/:version.Base/getQiniuToken');
//回复功能
Route::post('api/:version/base/replyUser','api/:version.Base/replyUser');
// +----------------------------------------------------------------------
// | put update
// +----------------------------------------------------------------------

// +----------------------------------------------------------------------
// | delete delete
// +----------------------------------------------------------------------

// +----------------------------------------------------------------------
// | 获取用户信息的
// +----------------------------------------------------------------------

// +----------------------------------------------------------------------
// | 测试专用
// +----------------------------------------------------------------------

Route::get('api/:version/test/:id','api/:version.TestDemo/testNoReadNum');



// +----------------------------------------------------------------------
// | 后台专用
// +----------------------------------------------------------------------
//主页
Route::get('admin/index/index','admin/Index/index');
//发布信息列表页
Route::get('admin/info/info','admin/Info/info');
//发布信息详细页面
Route::get('admin/info/detail/:id','admin/Info/detail');
//发布信息搜索页面
Route::post('admin/info/search','admin/Info/searchInfo');
//返回主页数据
Route::post('admin/info/updateinfo','admin/Info/updateinfo');
//设置消息等级
Route::get('admin/Level/setLevelType/:info_id','admin/Level/setLevelType');
//新增消息
Route::get('admin/info/addNews','admin/Info/addNews');

//查看用户列表页面
Route::get('admin/user/user','admin/User/user');
//用户搜索页面
Route::post('admin/user/search','admin/User/searchUser');
//根据id查看用户详细
Route::get('admin/user/detail/:id','admin/User/detail');
//查看评论信息页面
Route::get('admin/comment/comment','admin/Comment/comment');
//查询评论信息
Route::post('admin/comment/search','admin/Comment/searchComment');
//登录页面
Route::get('admin/admin/login','admin/admin/login');
//管理员列表页
Route::get('admin/admin/admin','admin/admin/admin');
//新增管理员页面
Route::get('admin/admin/addlist','admin/admin/addList');
//管理员id详情页面页面
Route::get('admin/admin/updatelist/:id','admin/admin/updateList');
//根据名称查询管理员
Route::post('admin/admin/search','admin/admin/searchAdmin');
//查看加金币记录
Route::get('admin/record/record','admin/Record/record');