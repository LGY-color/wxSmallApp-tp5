<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/3
 * Time: 22:23
 */

namespace app\api\model;


use app\lib\exception\DbException;
use app\lib\exception\MoneyException;
use app\lib\exception\ParamsException;
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
        return $result['gold_coin'];
    }
    //扣除金币
    public static function minusGold($params){
        $condition = [
            'id'=>Session::get('userid')
        ];
        $result = Db::table('pdzg_user')->where($condition)->setDec('gold_coin',$params['cost']);
        return $result;
    }
    //根据用户id 查询剩余发布数
    public static function publishNum(){
        $condition = [
            'id'=>Session::get('userid')
        ];
        $result = Db::field('publish_num')->table('pdzg_user')->where($condition)->find();
        return $result['publish_num'];
    }
    //扣除用户发布数
    public static function minusPublish(){
        $num = self::publishNum();
        if($num > 0){
            $condition = [
                'id'=>Session::get('userid')
            ];
            $result = Db::table('pdzg_user')->where($condition)->setDec('publish_num',1);
        }else{
            throw new ParamsException([
               'msg'=> '您已经发部超过6条了，请解锁！'
            ]);
        }
        return $result;
    }
    //根据id查询用户资料
    public static function getUserInfo(){
        $condition = [
            'id'=>Session::get('userid')
        ];
        $field = [
            'username,img_url,phone,email,weixin,gold_coin,real_name,id_card,last_ip,qq,level,publish_num,credit_num,create_time,introduce,update_time'
        ];
        $result = Db::field($field)->table('pdzg_user')->where($condition)->select();
        return $result;
    }
    //解锁
    public static function toUnlock($params){
        $condition = [
            'id'=>Session::get('userid')
        ];
        $update = [
            'publish_num'=>6
        ];
        $money = self::getGoldCoinById();
        $cost = $params['cost'];
        if((int)$money >= (int)$cost){
            self::minusGold($params);
        }else{
            throw new MoneyException();
        }
        $result = Db::table('pdzg_user')->where($condition)->update($update);
        return $result;
    }

    //更新用户信息
    public static function updateUser($params){
        $condition = [
            'id'=>Session::get('userid')
        ];
        $update = [
            'username'=>$params['username'],
            'phone'=>$params['phone'],
            'weixin'=>$params['weixin'],
            'qq'=>$params['qq'],
            'introduce'=>$params['introduce']
        ];
        $result = Db::table('pdzg_user')->where($condition)->update($update);
        return $result;
    }

}