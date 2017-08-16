<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/27
 * Time: 9:41
 */

namespace app\admin\controller;


use app\admin\model\LevelType as LevelTypeModel;
use think\Controller;
use think\Request;

class Level extends BaseController
{
    public function setLevelType(){
        $request = Request::instance();
        $params = $request->param();
        if($params['lv_id'] == ''){
            $lv_id = LevelTypeModel::insertLevelType($params);
            $result = LevelTypeModel::getLevelStatus($lv_id);
        }else{
            $result = LevelTypeModel::getLevelStatus($params['lv_id']);
        }
//        return json($result);
        $this->assign('result',$result);
        return $this->fetch('level');
    }
    public function updateLevelType(){
        $request = Request::instance();
        $params = $request->param();
        $result = LevelTypeModel::setLevelStatus($params);
        if($result){
            return adminRes('1','更新成功');
        }else{
            return adminRes('0','更新失败，请重试');
        }
//        return json($result);
    }
}