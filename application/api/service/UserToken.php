<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/3
 * Time: 22:26
 */

namespace app\api\service;


use app\lib\exception\WeChatException;
use think\Exception;

class UserToken
{
    protected $code;
    protected $wxAppID;
    protected $wxAppSecret;
    protected $wxLoginUrl;
    function __construct($code){
        $this->code = $code;
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
                $this->grantToken($wxResult);
            }
        }
    }
    private function proessLoginError($wxResult){
        throw new WeChatException([
            'msg'=>$wxResult['errmsg'],
            'errorCode'=>$wxResult['errcode']
        ]);
    }

    private function grantToken($wxResult){
        //拿到openID
        //去数据库比对,查看openID是否存在
        //如果存在则不处理 如果不存在则新增一条用户信息
        //生成令牌 准备缓存数据 写入缓存
        //把令牌返回到客户端去
        $openid = $wxResult['openid'];
    }
}