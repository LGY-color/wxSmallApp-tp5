<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/6
 * Time: 21:20
 */

namespace app\api\service;


use app\api\model\User;
use app\lib\exception\DbException;
use app\lib\exception\ParamsException;
use think\Cache;
use think\Session;

class Token
{
    public static function generateToken(){
        //32个字符组成随机字符串
        $randChars = getRandChar(32);
        //用三组md5加密
        $timestamp = $_SERVER['REQUEST_TIME_FLOAT'];
        //salt 盐
        $salt = config('secure.token_salt');
        return md5($randChars.$timestamp.$salt);
    }
    //验证token
    public static function verifyToken($token)
    {
        $exist = Cache::get($token);
        if(!$exist){
            return false;
        }
        $exist = json_decode($exist,true);
        $openid = $exist['openid'];
        $result = User::getByOpenID($openid);
        $userid = $result->id;
        Session::set('userid',$userid);
        if($userid){
            return true;
        }
        else{
            throw new ParamsException([
               'msg'=>'用户不存在'
            ]);
        }
    }
}