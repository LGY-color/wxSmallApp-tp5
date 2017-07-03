<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/3
 * Time: 22:30
 */

namespace app\api\validate;


use app\api\model\BaseModel;

class TokenGet extends BaseModel
{
    protected $rule = [
      'code' => 'require|isNotEmpty'
    ];

    protected $message = [
      'code'=>'没有code无法获取token!'
    ];
}