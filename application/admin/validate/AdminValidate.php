<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/31
 * Time: 14:57
 */

namespace app\admin\validate;





use app\lib\exception\DbException;
use think\captcha\Captcha;


class AdminValidate extends BaseValidate
{
    // 验证规则
    protected $rule = [
        'admin'=>'require',
        'password'=>'require|min:6',
        'captcha'=>'require|captcha'
    ];
    protected $message = [
        'admin'=>'管理员名必须存在',
        'password'=>'密码必须|密码长度至少6位',
        'captcha'=>'验证码错误'
    ];


}