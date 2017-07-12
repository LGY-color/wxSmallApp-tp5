<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/12
 * Time: 16:21
 */

namespace app\admin\model;


class Money extends BaseModel
{
    //获取最新充值信息
    public static function getNewMoney($limit=5){
        $condition = [
            'status'=>'1'
        ];
        $order = [
            'update_time'=>'DESC'
        ];
        $result = Db::table('pdzg_money')->where($condition)->limit($limit)->order($order)->select();
        return $result;
    }
}