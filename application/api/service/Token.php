<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/6
 * Time: 21:20
 */

namespace app\api\service;


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
}