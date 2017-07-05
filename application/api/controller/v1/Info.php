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
        $request =Request::instance();
        $params = $request->post();
        $data = InfoModel::getConditionInfo($params);
        return json($data);
    }
}