<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/3
 * Time: 22:23
 */

namespace app\api\model;


class User extends BaseModel
{
    public static function getByOpenID($openid){
        $user = User::where('openid','=',$openid)->find();
        return $user;
    }

    //根据用户用户余额
    public static function getGoldCoinById($user_id){
        $result = Db::field('gold_coin')->table('pdzg_user')->where('id',$user_id)->find();
        return $result['gold_coin'];
    }

}