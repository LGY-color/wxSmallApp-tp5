<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/27
 * Time: 9:41
 */

namespace app\admin\controller;


use think\Controller;

class LevelType extends Controller
{
    public function setLevelType(){
        return $this->fetch('index');
    }
}