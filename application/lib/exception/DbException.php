<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/6
 * Time: 14:43
 */

namespace app\lib\exception;


class DbException extends BaseException
{
    public $code = 404;
    public $msg = '数据库异常，请重试。';
    public $errorCode = 100004;
}