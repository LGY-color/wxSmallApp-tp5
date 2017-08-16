<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/8
 * Time: 15:29
 */

namespace app\admin\controller;
use app\admin\model\Record AS RecordModel;

class Record extends BaseController
{
    public function record(){
        $data = RecordModel::readRecord();
        $page = $data->render();
//        return json($result);
//        return json($result);
        $this->assign('page',$page);
        $this->assign('result',$data);
        return $this->fetch();
    }
}