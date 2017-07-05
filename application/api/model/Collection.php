<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/5
 * Time: 16:56
 */

namespace app\api\model;


use think\Db;

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
}