<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/26
 * Time: 14:29
 */

namespace app\lib\exception;


class ParamsException extends BaseException
{
    public $code = 400;
    public $msg = "数据不对";
    public $errorCode = 10001;
}