<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/9
 * Time: 10:32
 */

namespace app\admin\controller;


use think\Controller;

class Welcome extends Controller
{
    public function welcome(){
        return $this->fetch();
    }
}