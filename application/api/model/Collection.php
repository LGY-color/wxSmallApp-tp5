<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/5
 * Time: 16:56
 */

namespace app\api\model;


use app\lib\exception\DbException;
use think\Db;
use think\Session;

class Collection extends BaseModel
{
    //查询已经个人收藏的信息
    public static function getCollection($user_id,$limit=5){
        $field = [
            'i.*',
            'i.id as infoId',
            'c.create_time as c_create_time',
            'c.update_time as c_update_time'
        ];
        $condition = [
            'c.user_id'=>$user_id,
            'i.status'=>1
        ];
        $join = [
            ['pdzg_info i','c.info_id = i.id','LEFT']
        ];
        $order = [
            'c_update_time DESC'
        ];
        $data = Db::field($field)->table('pdzg_collection')->alias('c')->join($join)->limit($limit)->where($condition)->order($order)->select();
        return $data;
    }
    //查看对应id信息是否被收藏
    public static function infoCollection($infoid){
        $field = [
            'id,status'
        ];
        $condition = [
            'info_id'=>$infoid,
            'user_id'=>Session::get('userid')
        ];
        $result = Db::field($field)->table('pdzg_collection')->where($condition)->find();
        return $result;
    }
    //收藏信息
    public static function collectionInfo($params){
        $exist = $params['status'];
        if($exist == 2 || $exist == 1){
            $condition = [
                'id'=>$params['id']
            ];
            $update = [
                'status'=> $params['status'] == 2 ? 1 : 2
            ];
            $result = Db::table('pdzg_collection')->where($condition)->update($update);

        }else{
            $data = [
                'info_id'=>$params['infoid'],
                'user_id'=>Session::get('userid'),
                'create_time'=>time(),
                'update_time'=>time()
            ];
            $result = Db::table('pdzg_collection')->insert($data);
        }
        return $result;
    }
}