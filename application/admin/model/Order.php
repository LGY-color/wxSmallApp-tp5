<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/12
 * Time: 17:13
 */

namespace app\admin\model;


use think\Db;

class Order extends BaseModel
{
    //统计今日全部类型单数
    public static function getTodayNum(){
        $beginToday=mktime(0,0,0,date('m'),date('d'),date('Y'));
        $field = [
            'order_style',
            'count(*) AS num'
        ];
        $condition = [
            'status'=>1,
            'update_time'=>['>=',$beginToday]
        ];
        $count = Db::field($field)->table('pdzg_order')->where($condition)->group('order_style')->select();
        return $count;
    }

}