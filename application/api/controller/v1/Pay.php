<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/30
 * Time: 16:04
 */

namespace app\api\controller\v1;
use app\api\service\Pay AS PayService;
use app\api\validate\MoneyMustBePositiveInt;
use think\Request;

class Pay extends Base
{
    //请求预订单信息
    public function getPreOrder(){
        (new MoneyMustBePositiveInt())->goCheck();
        $request = Request::instance();
        $params = $request->param();
        $money = $params['money'];
        $pay = new PayService();
        return $pay->pay($money);
    }
}