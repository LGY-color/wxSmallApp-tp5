<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/3
 * Time: 22:23
 */

namespace app\api\model;


use app\lib\exception\DbException;
use think\Db;
use think\Session;

class User extends BaseModel
{
    public static function getByOpenID($openid){
        $user = User::where('openid','=',$openid)->find();
        return $user;
    }

    //根据用户用户余额
    public static function getGoldCoinById(){
        $condition = [
            'id'=> Session::get('userid')
        ];
        $result = Db::field('gold_coin')->table('pdzg_user')->where($condition)->find();
        return $result;
    }
    //扣除金币
    public static function minusGold($params){
        $condition = [
            'id'=>Session::get('userid')
        ];
        $result = Db::table('pdzg_user')->where($condition)->setDec('gold_coin',$params['cost']);
        return $result;
    }

}