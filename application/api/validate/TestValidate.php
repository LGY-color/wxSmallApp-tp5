<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/2
 * Time: 21:50
 */

namespace app\api\validate;


use think\Validate;

class TestValidate extends Validate
{
//    定义验证器 规则为$rule 为固定
    protected $rule = [
        'name'=>'require|max:10',
        'email'=>'email'
    ];
    
}