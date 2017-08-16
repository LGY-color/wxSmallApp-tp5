<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/21
 * Time: 9:26
 */

namespace app\admin\model;


use think\Db;

class BigItem extends BaseModel
{
    public static function getBigItem(){
        $field = [
            'item_name,id AS bi_id',
        ];
        $condition = [
            'item_type'=> 2,
            'status'=>1
        ];
        $result = Db::field($field)->table('pdzg_big_item')->where($condition)->select();
        return $result;
    }
}