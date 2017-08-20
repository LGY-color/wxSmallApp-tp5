<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/3
 * Time: 22:26
 */

namespace app\api\service;


use app\api\model\User;
use app\lib\exception\TokenException;
use app\lib\exception\WeChatException;
use think\Exception;

class UserToken extends Token
{
    protected $code;
    protected $wxAppID;
    protected $wxAppSecret;
    protected $wxLoginUrl;
    function __construct($code,$username){
        $this->code = $code;
        $this->username = $username;
        $this->wxAppID = config('wx.app_id');
        $this->wxAppSecret = config('wx.app_secret');
        $this->wxLoginUrl = sprintf(config('wx.login_url'),$this->wxAppID,$this->wxAppSecret,$this->code);
    }

    public function get($code=''){
        $result = curl_get($this->wxLoginUrl);
        $wxResult = json_decode($result,true);
        if(empty($wxResult)){
            throw new Exception('获取session_key和openId时出现异常,微信内部出错');
        }else{
            $loginFail = array_key_exists('errcode',$wxResult);
            if($loginFail){
                $this->proessLoginError($wxResult);
            }else{
                return $this->grantToken($wxResult);
            }
        }
    }
    //不存在新建用户
    private function newUser($openid){
        $user = User::create([
            'openid' =>$openid,
            'username'=>$this->username,
            'level'=>8,
            'create_time'=>time(),
        ]);
        return $user->id;
    }
    //抛出错误
    private function proessLoginError($wxResult){
        throw new WeChatException([
            'msg'=>$wxResult['errmsg'],
            'errorCode'=>$wxResult['errcode']
        ]);
    }
    //获取token
    private function grantToken($wxResult){
        //拿到openID
        //去数据库比对,查看openID是否存在
        //如果存在则不处理 如果不存在则新增一条用户信息
        //生成令牌 准备缓存数据 写入缓存
        //把令牌返回到客户端去
        //key 令牌 value wxResult uid scope
        $openid = $wxResult['openid'];
        $user = User::getByOpenID($openid);
        if($user){
           $uid = $user->id;
        }else{
           $uid =  $this->newUser($openid);
        }
        $cacheValue = $this->prepareCacheValue($wxResult,$uid);
        $token = $this->saveToCache($cacheValue);
        return $token;
    }
    //准备缓存
    private function prepareCacheValue($wxResult,$uid){
        $cacheValue = $wxResult;
        $cacheValue['uid'] = $uid;
        $cacheValue['scope'] = 16;
        return $cacheValue;
    }
    //写入缓存
    private function saveToCache($cacheValue){
        $key = self::generateToken();
        $value = json_encode($cacheValue);
        $expire_in = config('setting.token_expire_in');
        $request =cache($key,$value,$expire_in);
        if(!$request){
            throw new TokenException([
                'msg'=>'服务器缓存异常',
                'errorCode'=>10005
            ]);
        }
        return $key;
    }
}