<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/2
 * Time: 23:28
 */

namespace app\api\validate;


use think\Exception;
use think\Request;
use think\Validate;

class BaseValidate extends Validate
{
    public function goCheck(){
        //1.获取参数 2.做校验
        $request = Request::instance();
        $params = $request->param();

        $result = $this->check($params);
        if(!$result){
            $error = $this->error;
            throw new Exception($error);
        }else{
            return true;
        }
    }
}