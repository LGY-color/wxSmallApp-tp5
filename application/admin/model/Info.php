<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/10
 * Time: 20:30
 */

namespace app\admin\model;


use think\Db;

class Info extends BaseModel
{
    //获取发布信息
    public static function getInfoCount(){
        $condition = [
            'status'=>'1'
        ];
        $count = Db::table('pdzg_info')->where($condition)->count('id');
        return $count;
    }

    //获取今日发布信息
    public static function getInfoTodayNew(){
        $beginToday=mktime(0,0,0,date('m'),date('d'),date('Y'));
        $condition = [
            'status'=>1,
            'update_time'=>['>=',$beginToday]
        ];
        $count = Db::table('pdzg_info')->where($condition)->count();
        return $count;
    }
    //获取最新文章
    public static function getNewInfo($limit=5){
        $condition = [
            'status'=>'1'
        ];
        $order = [
            'update_time'=>'DESC'
        ];
        $result = Db::table('pdzg_info')->where($condition)->limit($limit)->order($order)->select();
        return $result;
    }
}