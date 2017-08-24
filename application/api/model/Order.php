<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/22
 * Time: 17:34
 */

namespace app\api\model;


use think\Db;
use think\Session;

class Order
{
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
            'uid'=>Session::get('userid'),
            'info_id'=>$params['infoid'],
            'level_type'=>$params['level_type'],
            'order_money'=>$params['order_money'],
            'who'=>Session::get('userid'),
            'ip'=>getIP(),
            'create_time'=>time(),
            'update_time'=>time()
        ];
        $result = Db::table('pdzg_order')->insert($insert);
        return $result;
    }
}