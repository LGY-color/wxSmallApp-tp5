<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/4
 * Time: 11:03
 */

namespace app\api\controller\v1;


use think\Controller;
use think\Request;
use app\api\model\Info as InfoModel;
class Info extends Controller
{
    public function getConditionInfo(){
        $request = Request::instance();
        $params = $request->param();
//        $url = explode('&',$params['condition']);
//        foreach ($url as $item){
//
//        }
//        return json($condition);
        $condition = $params['condition'];
        $data = InfoModel::getConditionInfo($condition);
        return json($data);
    }
}