<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/5
 * Time: 9:56
 */

namespace app\api\controller\v1;


use app\api\validate\IDMustBePositiveInt;
use think\Controller;
use app\api\model\Info as InfoModel;
class Base extends Controller
{
    //根据id进入详细
    public function getIdInfo($id){
        (new IDMustBePositiveInt())->goCheck();
        $data = InfoModel::getIdInfo($id);
        return json($data);
    }
}