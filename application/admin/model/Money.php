<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/12
 * Time: 16:21
 */

namespace app\admin\model;


use think\Db;

class Money extends BaseModel
{
    //获取最新充值信息
    public static function getNewMoney($limit=5){
        $field = [
            'm.id,m.money,m.update_time',
            'u.id AS uid,u.username'
        ];
        $join = [
            ['pdzg_user u','u.id = m.user_id','LEFT']
        ];
        $condition = [
            'm.status'=>'1'
        ];
        $order = [
            'update_time'=>'DESC'
        ];
        $result = Db::field($field)->table('pdzg_money')->alias('m')->join($join)->where($condition)->limit($limit)->order($order)->select();
        return $result;
    }

    //获取今日充值信息
    public static function getTodayMoney(){
        $beginToday=mktime(0,0,0,date('m'),date('d'),date('Y'));
        $field = [
            'SUM(money) AS money'
        ];
        $condition = [
            'update_time'=>['>=',$beginToday]
        ];
        $result = Db::field($field)->table('pdzg_money')->where($condition)->select();
        return $result;
    }
}