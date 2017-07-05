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
//Route::get('api/:version/test','api/:version.TestDemo/test');
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
//根据筛选条件获取数据
Route::post('api/:version/info','api/:version.Info/getConditionInfo');
//根据id 进入详情
Route::get('api/:version/base/:id','api/:version.Base/getIdInfo');
//Route::get('api/:version/index/:id','api/:version.Index/index');