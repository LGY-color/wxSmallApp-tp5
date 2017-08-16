<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/29
 * Time: 9:49
 */

namespace app\lib\exception;


class AdminException extends BaseException
{
    public $code = 400;
    public $msg = '超越权限使用权力，严重不合法';
    public $errorCode = 10000;
}