<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/13
 * Time: 11:22
 */

namespace app\admin\controller;


use app\api\validate\IDMustBePositiveInt;
use think\Controller;
use app\admin\model\Info as InfoModel;

class Info extends Controller
{
    public function info(){
        $data = InfoModel::getInfoList();
        $page = $data->render();
        $result['info_list'] = $data;
//        return json($result);
        $this->assign('page',$page);
        $this->assign('result',$result);
        return $this->fetch();
    }
    public function detail($id){
        (new IDMustBePositiveInt())->goCheck();
        return $this->fetch();
    }
}