<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/3
 * Time: 15:02
 */

namespace app\api\service;

use think\Db;
use think\Exception;
use think\Loader;
use think\Log;
use think\Session;

Loader::import('WxPay.WxPay',EXTEND_PATH,'.Api.php');
class WxNotify extends \WxPayNotify
{
    public function NotifyProcess($data, &$msg)
    {
       if($data['result_code'] == 'SUCCESS'){
           //开启事务防止 多次插入
           Db::startTrans();
           try{
               $moneyId = $this->existOrderNo($data['out_trade_no']);
               if($moneyId){
                   $params['money'] = $data['cash_fee'];
                   $params['id'] = $moneyId;
                   $this->updateMoney($params);
               }
               Db::commit();
               return true;
           }catch (Exception $ex){
                Db::rollback();
                Log::error($ex);
                return false;
           }
       }else{
           return true;
       }
    }
    //检测订单号是否已经存在 防止微信多次用api 多次插入
    private function existOrderNo($orderNo){
        $condition = [
            'order_no'=>$orderNo
        ];
        $field = [
            'id'
        ];
        $result = Db::field($field)->table('pdzg_money')->where($condition)->find();
        return $result[0];
    }
    //新增充值金额订单
    private function updateMoney($params){
        $data = [
            'money'=>$params['money'],
            'status'=>1,
            'update_time'=>time()
        ];
        $condition = [
            'id'=>$params['id']
        ];
        $result = Db::table('pdzg_moeny')->where($condition)->update($data);
        return $result;
    }
}