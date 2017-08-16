<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/28
 * Time: 16:34
 */

namespace app\admin\controller;


use app\admin\model\User as UserModel;
use app\admin\validate\MoneyMustBePositiveInt;
use think\Request;

class User extends BaseController
{
    public function User(){
        $data = UserModel::getUserList();
        $page = $data->render();
//        return json($data);
        $this->assign('page',$page);
        $this->assign('result',$data);
        return $this->fetch();
    }
    //根据id获取用户信息
    public function detail($id){

        $result = UserModel::getUserById($id);
//        return json($result);
        $this->assign('result',$result);
        return $this->fetch();
    }
    //根据id更新用户信息
    public function updateUser(){
        $request = Request::instance();
        $params = $request->param();
        $result = UserModel::updateUser($params);
        if($result){
            return adminRes('1','更新成功');
        }else{
            return adminRes('0','更新失败，请重试');
        }
    }
    //根据id删除用户信息
    public function delUser(){
        $request = Request::instance();
        $params = $request->param();
        $result = UserModel::delUser($params);
        if($result){
            return adminRes('1','删除成功');
        }else{
            return adminRes('0','删除失败，请重试');
        }
    }
    //根据id给用户加金币
    public function addMoney(){
        (new MoneyMustBePositiveInt())->goCheck();
        $request = Request::instance();
        $params = $request->param();
        $result = UserModel::addMoney($params);
        if($result){
            return adminRes('1','充值成功');
        }else{
            return adminRes('0','充值失败');
        }
    }
    //用户加金币页面
    public function money(){
        return $this->fetch();
    }
    //根据用户名搜索
    public function searchUser(){
        $request = Request::instance();
        $params = $request->param();
        $data = UserModel::searchUser($params);
        $page = $data->render();
//        return json($data);
        $this->assign('page',$page);
        $this->assign('result',$data);
        return $this->fetch('search');
    }
}