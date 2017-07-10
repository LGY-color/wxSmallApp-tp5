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
    //必须是正整数
    protected function isPositiveInteger($value,$rule='',$data='',$field=''){
        if(is_numeric($value) && is_int($value + 0 ) && ($value+0)>0){
            return true;
        }else{
            return false;
        }
    }
    //必须存在
    protected function isNotEmpty($value, $rule='', $data='', $field='')
    {
        if (empty($value)) {
            return false;
        } else {
            return true;
        }
    }
    //根据规则获取数据
    public function getDateByRule($arrays){
        if (array_key_exists('user_id',$arrays) | array_key_exists('uid',$arrays)){
            //不允许包含uid的参数进来
            throw new ParameterException([
                'msg'=>'参数包含非法user_id或是uid'
            ]);
        }
        $newArray = [];
        foreach ($this->rule as $key=>$value){
            $newArray[$key] = $arrays[$key];
        }
        return $newArray;
    }
}