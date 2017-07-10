<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/10
 * Time: 17:43
 */

namespace app\admin\controller;


use app\admin\model\User as UserModel;

class Index
{
    public function index(){
//        $result['user_count'] = UserModel::getUserCount();
        $result['user_new_count'] = UserModel::getUserTodayNew();
        return json($result);
    }
}