<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/12
 * Time: 17:13
 */

namespace app\admin\model;


use think\Db;
use think\Session;

class Order extends BaseModel
{
    //统计今日全部类型单数
    public static function getTodayNum(){
        $beginToday=mktime(0,0,0,date('m'),date('d'),date('Y'));
        $field = [
            'level_type',
            'COUNT(*) AS num'
        ];
        $condition = [
            'status'=>1,
            'update_time'=>['>=',$beginToday]
        ];
        $count = Db::field($field)->table('pdzg_order')->where($condition)->group('level_type')->select();
        return $count;
    }
    //根据管理操作 转换成订单数
    public static function createOrder($params=[]){
        if(isset($params['red'])) {
            if ($params['red'] == 1) {
                $params['level_type'] = config('order.red');
                $params['order_money'] = config('expenses.red');
                self::insertOrder($params);
            }
        }
        if(isset($params['bold'])) {
            if ($params['bold'] == 1) {
                $params['level_type'] = config('order.bold');
                $params['order_money'] = config('expenses.bold');
                self::insertOrder($params);
            }
        }
        if(isset($params['top'])){

            if($params['top'] == 1){
                $params['level_type'] = config('order.top');
                $params['order_money'] = countTopMoney($params);
                self::insertOrder($params);
            }
        }


    }
    public static function insertOrder($params=[]){
        $insert = [
            'uid'=>$params['user_id'],
            'info_id'=>$params['info_id'],
            'level_type'=>$params['level_type'],
            'order_money'=>$params['order_money'],
            'who'=>Session::get('admin_sxxcpd_id'),
            'ip'=>getIP(),
            'create_time'=>time(),
            'update_time'=>time()
        ];
        $result = Db::table('pdzg_order')->insert($insert);
        return $result;
    }
}