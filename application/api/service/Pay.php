<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/30
 * Time: 16:54
 */

namespace app\api\service;


use app\lib\exception\ParamsException;

use think\Loader;
use think\Log;
use think\Session;

//extend/WxPay/WxPay.Api.php
Loader::import('WxPay.WxPay',EXTEND_PATH,'.Api.php');
class Pay
{
    private $orderID;
    private $orderNO;
    function __construct(){
        $orderNO = time().rand(1000,9999);
        $this->orderNO = $orderNO;
    }

    public function pay($money){
//        $money = 100;
        return $this->makeWxPreOrder($money);
    }

    //构建微信订单
    private function makeWxPreOrder($totalPrice){
        $wxOrderData = new \WxPayUnifiedOrder();
        //订单号 自己生成
        $wxOrderData->SetOut_trade_no($this->orderNO);
        //交易类型 固定 JSAPI
        $wxOrderData->SetTrade_type('JSAPI');
        //订单价格 以分作为单位 money*100
        $wxOrderData->SetTotal_fee($totalPrice*100);
        //商品描述 自定义
        $wxOrderData->SetBody('小吃盘店');
        //用户的openid
        $openid = Session::get('openid');
        $wxOrderData->SetOpenid($openid);
        //设置微信回调通知接收地址
        $wxOrderData->SetNotify_url(config('secure.pay_back_url'));
        return $this->getPaySignature($wxOrderData);
    }

    //向微信请求订单号并生成签名
    private function getPaySignature($wxOrderData){
        $wxOrder = \WxPayApi::unifiedOrder($wxOrderData);
        if($wxOrder['return_code'] != 'SUCCESS' || $wxOrder['result_code'] != 'SUCCESS'){
            Log::record($wxOrder,'error');
            Log::record('获取预支付订单失败','error');
        }
        //prepay_id 向用户推送模板消息
        $this->recordOrder($wxOrder);
        $signature = $this->sign($wxOrder);
        return $signature;
    }
    //生成签名
    private function sign($wxOrder){
        $jsApiPayData = new \WxPayJsApiPay();
        $jsApiPayData->SetAppid(config('wx.app_id'));
        $jsApiPayData->SetTimeStamp((string)time());
        $rand = md5(time().mt_rand(0,1000));
        $jsApiPayData->SetNonceStr($rand);
        $jsApiPayData->SetPackage('prepay_id='.$wxOrder['prepay_id']);
        $jsApiPayData->SetSignType('md5');
        //调签名
        $sign = $jsApiPayData->MakeSign();
        //调数组
        $rawValues = $jsApiPayData->GetValues();
        $rawValues['paySign'] = $sign;
        //删除appid
        unset($rawValues['appId']);
        return $rawValues;
    }
    //处理保存订单记录 prepay_id userid orderno
    private function recordOrder($wxOrder){
        $data = [
            'order_no'=>$this->orderNO,
            'prepay_id'=>$wxOrder['prepay_id'],
            'user_id'=>Session::get('userid'),
            'orging'=>'微信支付',
            'create_time'=>time()
        ];
        $result = Db::table('pdzg_moeny')->insert($data);
        return $result;
    }
}