<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/2
 * Time: 22:06
 */

namespace app\api\validate;


use think\Validate;

class MoneyMustBePositiveInt extends BaseValidate
{
    protected $rule = [
        'money'=>'require|isPositiveInteger'
    ];
    protected $message = [
      'money'=>'必须是正整数.'
    ];
}