<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/10
 * Time: 17:43
 */

namespace app\admin\model;



use app\lib\exception\AdminException;
use app\lib\exception\DbException;
use think\Db;
use app\admin\model\Record as RecordModel;
class User extends BaseModel
{
    //获取用户总数
    public static function getUserCount(){
        $condition = [
            'status'=>'1'
        ];
        $count = Db::table('pdzg_user')->where($condition)->count('id');
        return $count;
    }

    //获取今日新注册用户
    public static function getUserTodayNew(){
        $beginToday=mktime(0,0,0,date('m'),date('d'),date('Y'));
        $condition = [
            'status'=>1,
            'update_time'=>['>=',$beginToday]
        ];
        $count = Db::table('pdzg_user')->where($condition)->count();
        return $count;
    }
    //根据用户用户余额
    public static function getGoldCoinById($user_id){
        $result = Db::field('gold_coin')->table('pdzg_user')->where('id',$user_id)->find();
        return $result;
    }
    //获取用户列表
    public static function getUserList(){
        $field = [
            'id,username,phone,code_id,gold_coin,level'
        ];
        $condition = [
            'status'=>1
        ];
        $order = [
            'update_time'=>'DESC'
        ];
        $result = Db::field($field)->table('pdzg_user')->where($condition)->order($order)->paginate(10);
        return $result;
    }
    //通过id查询用户信息
    public static function getUserById($id){
        $condition = [
            'id'=>$id
        ];
        $result = Db::table('pdzg_user')->where($condition)->find();
        return $result;
    }
    //根据id更新用户信息
    public static function updateUser($params=[]){
        $condition = [
            'id'=>$params['user_id']
        ];
        if($params['level'] > 64){
            throw new AdminException();
        }
        $update = [
            'level'=>$params['level'],
            'username'=>$params['username'],
            'phone'=>$params['phone'],
            'weixin'=>$params['weixin'],
            'qq'=>$params['qq'],
            'real_name'=>$params['real_name'],
            'id_card'=>$params['id_card'],
            'update_time'=>time()
        ];

        $result = Db::table('pdzg_user')->where($condition)->inc('gold_coin',$params['add_gold_coin']+0)->update($update);
        if($result){
            return $result;
        }else{
            throw new DbException();
        }
    }
    //根据id删除用户信息
    public static function delUser($params=[]){
        $condition = [
            'id'=>$params['user_id']
        ];
        $update = [
            'status'=>0
        ];
        $result = Db::table('pdzg_user')->where($condition)->update($update);
        if($result){
            return $result;
        }else{
            throw new DbException();
        }
    }
    //根据用户id加金币
    public static function addMoney($params=[]){
        $money = ($params['money']+0)*$params['multiply'];
        $condition = [
            'id'=>$params['userid']
        ];
        $result = Db::table('pdzg_user')->inc('gold_coin',$money)->where($condition)->update();
        if($result){
            RecordModel::writeRecord($params);
            return $result;
        }else{
            throw new DbException();
        }
    }
    //根据用户名搜索
    public static function searchUser($params=[]){
        $field = [
            'id,username,phone,code_id,gold_coin,level'
        ];
        $condition = [
            'status'=>1,
            'username'=>['LIKE','%'.$params['username'].'%']
        ];
        $order = [
            'update_time'=>'DESC'
        ];
        $result = Db::field($field)->table('pdzg_user')->where($condition)->order($order)->paginate(10);
        return $result;
    }



}