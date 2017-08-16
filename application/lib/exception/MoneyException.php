<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/27
 * Time: 8:16
 */

namespace app\lib\exception;


class MoneyException extends BaseException
{
    public $code = 400;
    public $msg = '您的金币不足';
    public $errorCode = 10000;
}