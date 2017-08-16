<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/31
 * Time: 14:58
 */

namespace app\admin\validate;


use app\lib\exception\AdminException;
use app\lib\exception\DbException;
use think\Exception;
use think\Request;
use think\Validate;

class BaseValidate extends Validate
{
    public function goCheck(){
        $request = Request::instance();
        $params = $request->param();
        $result = $this->batch()->check($params);
        if(!$result){
            $error = $this->error;

//            throw new Exception("$error");
            throw new AdminException([
               'msg'=>$error
            ]);
        }else{
            return true;

        }
    }
    //必须是正整数
    protected function isPositiveInteger($value,$rule='',$data='',$field=''){
        if(is_numeric($value) && is_int($value + 0 ) && ($value+0)>0){
            return true;
        }else{
            return false;
        }
    }
}