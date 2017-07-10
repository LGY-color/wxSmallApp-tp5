<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/10
 * Time: 9:20
 */

namespace app\admin\controller;


use think\Controller;

class ListInfo extends Controller
{
    public function listInfo(){
        return $this->fetch('ListInfo/listInfo');
    }
}