<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/10
 * Time: 17:43
 */

namespace app\admin\model;


use think\Db;

class User extends BaseModel
{
    //获取用户总数
    public static function getUserCount(){
        $condition = [
            'status'=>'1'
        ];
        $count = Db::table('pdzg_user')->where($condition)->count('id');
        return $count;
    }
    //获取今日新注册用户
    public static function getUserTodayNew(){
        $beginToday=mktime(0,0,0,date('m'),date('d'),date('Y'));
        $condition = [
            'status = 1',
            'update_time >='.$beginToday
        ];
        $count = Db::table('pdzg_user')->where($condition)->fetchSql(true)->select();
        return $count;
    }
}