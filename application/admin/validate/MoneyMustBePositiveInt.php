<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/6
 * Time: 9:15
 */

namespace app\admin\validate;


class MoneyMustBePositiveInt extends BaseValidate
{
    protected $rule = [
        'money'=>'require|isPositiveInteger'
    ];
    protected $message = [
        'money'=>'加的金币必须是正整数.'
    ];
}