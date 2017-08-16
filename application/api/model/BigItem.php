<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/4
 * Time: 8:26
 */

namespace app\api\model;


use think\Db;

class BigItem extends BaseModel
{
//    protected $hidden = [
//        'create_time',
//        'update_time',
//        'status'
//    ];
//    //获取8个大分类
//    public static function getBigItem(){
//        $condition = [
//            'item_type'=>2,
//            'status'=>1
//        ];
//        $data = BigItem::all($condition);
//        return $data;
//    }

    public static function getBigItem(){
        $condition = [
            'fbi.item_type' => 1,
            'fbi.status' => 1
        ];
        $field = [
            'fbi.item_name AS f_name,fbi.id AS f_id',
            'GROUP_CONCAT(sbi.item_name) AS s_name,GROUP_CONCAT(sbi.id) AS s_id'
        ];
        $join = [
            ['pdzg_big_item sbi','sbi.item_type_id = fbi.id','LEFT']
        ];
        $group = 'fbi.id';
        $data = Db::field($field)->table('pdzg_big_item')->alias('fbi')->join($join)->where($condition)->group($group)->select();
        return $data;
    }

}