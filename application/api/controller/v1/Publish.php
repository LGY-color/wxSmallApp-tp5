<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/5
 * Time: 9:37
 */

namespace app\api\controller\v1;


use think\Controller;

class Publish extends Controller
{
    public function InsertInfo(){
        $request = Request::instance();
        $params = $request->param();
    }
}