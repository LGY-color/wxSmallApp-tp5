<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/1
 * Time: 9:15
 */

namespace app\admin\model;


use app\lib\exception\AdminException;
use app\lib\exception\DbException;
use think\Db;
use think\Exception;
use think\Session;

class Admin extends BaseModel
{
    //验证登录
    public static function checkAdmin($params=[]){
        $condititon = [
            'user'=>$params['admin'],
            'password'=>psMD5($params['password']),
            'status'=>1
        ];
        $result = Db::table('pdzg_admin')->where($condititon)->find();
        $update = [
            'last_ip'=>$result['login_ip'],
            'last_time'=>$result['login_time'],
            'login_ip'=>getIP(),
            'login_time'=>time()
        ];
        if($result){
            $res = Db::table('pdzg_admin')->where($condititon)->update($update);
        }
        return $result;
//        }else{
//            throw new Exception('用户名或密码错误');
//        }

    }
    //获取管理员列表
    public static function getAdminList(){
        $condition = [
            'status'=>1,
            'level'=>['<',2048]
        ];
        $order = [
            'update_time'=>'DESC'
        ];
        $result = Db::table('pdzg_admin')->where($condition)->order($order)->paginate(10);
        return $result;
    }
    //添加管理员
    public static function addAdmin($params=[]){
        if($params['level'] >= Session::get('admin_sxxcpd_level')){
            throw new AdminException();
        }
        self::existAdmin($params['add_admin']);
        $insert = [
            'user'=>$params['add_admin'],
            'password'=>psMD5($params['add_password']),
            'phone'=>$params['phone'],
            'level'=>$params['level'],
            'create_time'=>time(),
            'update_time'=>time()
        ];
        $result = Db::table('pdzg_admin')->insert($insert);
        return $result;
    }
    //检测管理员存在
    public static function existAdmin($user){
        $exist = Db::table('pdzg_admin')->where('user',$user)->find();
        if($exist){
            throw new AdminException([
                'msg'=>'管理员名已存在'
            ]);
        }
        return $exist;
    }
    //根据id查看管理员信息
    public static function getAdminById($id){
        $result = Db::table('pdzg_admin')->where('id',$id)->find();

        return $result;
    }
    //更新根据id管理员信息
    public static function updateAdminById($params=[]){
        if($params['level'] > Session::get('admin_sxxcpd_level')){
            throw new AdminException();
        }
        if(Session::get('admin_sxxcpd_level') >= 512 || Session::get('admin_sxxcpd_id') == $params['id']){
            $condition = [
                'id'=>$params['id']
            ];
            self::existAdmin($params['add_admin']);
        }else{
            throw new AdminException([
                'msg'=>'你没有权力修改别人信息'
            ]);
        }
        $update = [
            'user'=>$params['add_admin'],
            'phone'=>$params['phone']
        ];
        if($params['level']){
            $update['level'] = $params['level'];
        }
        if($params['add_password']){

            $update['password'] = psMD5($params['add_password']);
        }
        $result = Db::table('pdzg_admin')->where($condition)->update($update);
        return $result;
    }
    //根据名称查找管理员
    public static function searchAdmin($params=[]){
        $condition = [
            'status'=>1,
            'level'=>['<',2048],
            'user'=>['LIKE','%'.$params['user'].'%']
        ];
        $order = [
            'update_time'=>'DESC'
        ];
        $result = Db::table('pdzg_admin')->where($condition)->order($order)->paginate(10);
        return $result;
    }
}