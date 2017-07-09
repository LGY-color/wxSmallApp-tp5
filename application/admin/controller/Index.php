<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/9
 * Time: 8:14
 */

namespace app\admin\controller;


use think\Controller;
class Index extends Controller
{
    public function index(){
//        return view('upload');当前控制下的upload.php
//        public/upload 目录下upload.php  admin\view\public\upload.html
//        return view('public/upload');
        $data['email'] = '764448863@qq.com';
        $data['phone'] = 18960501805;
        $this->assign('data',$data);
        return $this->fetch();
    }
}