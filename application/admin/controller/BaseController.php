<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/31
 * Time: 9:20
 */

namespace app\admin\controller;


use think\Controller;
use think\Session;

class BaseController extends Controller
{
    protected $admin_sxxcpd_user;
    protected $admin_sxxcpd_level;
    protected $beforeActionList = [
        'islogin'=>['except'=>'login,checkadmin'],
    ];
    protected function islogin(){
        $this->admin_sxxcpd_user = Session::get('admin_sxxcpd_user');
        $this->admin_sxxcpd_level = Session::get('admin_sxxcpd_level');
        if(!$this->admin_sxxcpd_user){
            $this->redirect('Admin/login');
            return false;
        }
        if($this->admin_sxxcpd_level < 128){
            $this->error('权限不足','Admin/login');
            return false;
        }
    }

}