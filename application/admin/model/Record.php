<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/6
 * Time: 8:58
 */

namespace app\admin\model;


use think\Db;
use think\Session;

class Record extends BaseModel
{
    //写入记录
    public static function writeRecord($params=[]){
        $insert = [
            'admin_id'=>Session::get('admin_sxxcpd_id'),
            'user_id'=>$params['userid'],
            'money'=>($params['money']+0)*$params['multiply'],
            'explain'=>$params['explain'],
            'multiply'=>$params['multiply'],
            'create_time'=>time()
        ];
        $result = Db::table('pdzg_record')->insert($insert);
        if($result){
            return $result;
        }else{
            throw new DbException();
        }
    }
    //读取记录
    public static function readRecord(){
        $field = [
            'r.*',
            'a.id AS admin_id,a.user AS admin_name',
            'u.id AS user_id,u.username AS user_name'
        ];
        $join = [
            ['pdzg_user u','u.id = r.user_id','LEFT'],
            ['pdzg_admin a','a.id = r.admin_id','LEFT']
        ];
        $order = [
            'create_time'=>'DESC'
        ];
        $result = Db::field($field)->table('pdzg_record')->alias('r')->join($join)->order($order)->paginate(10);
        return $result;
    }
}