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
//根据筛选条件获取数据
Route::get('api/:version/info/:condition','api/:version.Info/getConditionInfo');
//根据筛选条件获取数据 中文get会转码
Route::post('api/:version/info/getInfo','api/:version.Info/getConditionInfo');
//根据id 进入详情
Route::get('api/:version/base/:id','api/:version.Base/getIdInfo');
//获取用户已发布的信息
Route::get('api/:version/info/getPublish/:id','api/:version.Info/getPublish');
//获取用户已收藏信息
Route::get('api/:version/info/getCollection/:id','api/:version.Info/getCollection');
// +----------------------------------------------------------------------
// | post create update 暂定不用put
// +----------------------------------------------------------------------
//插入数据 到info表
Route::post('api/:version/info/InsertInfo','api/:version.Info/InsertInfo');
//更新数据 到info表
Route::post('api/:version/info/UpdateInfo','api/:version.Info/UpdateInfo');
//用code换取openid ==
Route::post('api/:version/token','api/:version.Token/getToken');
// +----------------------------------------------------------------------
// | put update
// +----------------------------------------------------------------------

// +----------------------------------------------------------------------
// | delete delete
// +----------------------------------------------------------------------