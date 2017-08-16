<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/31
 * Time: 8:23
 */

namespace app\admin\controller;


use app\admin\model\Admin as AdminModel;
use think\captcha\Captcha;
use think\Request;
use think\Session;

class Admin extends BaseController
{
    //获取所有管理员信息
    public function admin(){
        $data = AdminModel::getAdminList();
        $page = $data->render();
//        return json($result);
        $this->assign('page',$page);
        $this->assign('result',$data);
        return $this->fetch();
    }
    //登录界面
    public function login(){
        return $this->fetch();
    }
    //检查登录
    public function checkadmin(){
//        (new AdminValidate())->goCheck();
        $request = Request::instance();
        $params = $request->param();
        $check = new Captcha();
        if($check->check($params['captcha'])){
            $result = AdminModel::checkAdmin($params);
            if($result){
                Session::set('admin_sxxcpd_id',$result['id']);
                Session::set('admin_sxxcpd_user',$result['user']);
                Session::set('admin_sxxcpd_level',$result['level']);
                $this->success('登录成功', 'admin/index/index');
            }else{
                $this->error('用户名或者密码错误');
            }
        }else{
            $this->error('验证码错误');
        }
    }
    //登出
    public function logoutAdmin(){
        Session::clear();
        return $this->success('退出成功','admin/admin/login');
    }
    //新增管理员界面
    public function addList(){
        return $this->fetch('add');
    }
    //新增管理员
    public function addAdmin(){
        $request = Request::instance();
        $params = $request->param();
        $result = AdminModel::addAdmin($params);
        if($result){
            return adminRes('1','插入成功');
        }else{
            return adminRes('0','插入失败，请重试');
        }
    }
    //修改管理员页面
    public function updateList($id){
        $result = AdminModel::getAdminById($id);
        $this->assign('result',$result);
        return $this->fetch('update');
    }
    //修改管理员信息
    public function updateAdmin(){
        $request = Request::instance();
        $params = $request->param();
        $result = AdminModel::updateAdminById($params);
        if($result){
            return adminRes('1','插入成功');
        }else{
            return adminRes('0','插入失败，请重试');
        }
    }
    //根据名称查找管理员
    public function searchAdmin(){
        $request = Request::instance();
        $params = $request->param();
        $data = AdminModel::searchAdmin($params);
        $page = $data->render();
//        return json($result);
        $this->assign('page',$page);
        $this->assign('result',$data);
        return $this->fetch('search');
    }

}