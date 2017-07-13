<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/13
 * Time: 11:22
 */

namespace app\admin\controller;


use think\Controller;

class Info extends Controller
{
    public function info(){
        return $this->fetch();
    }
}