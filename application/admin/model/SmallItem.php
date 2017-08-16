<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/13
 * Time: 17:41
 */

namespace app\admin\model;


use think\Db;

class SmallItem extends BaseModel
{
    //获取小分类信息
    public static function getSmallItem(){
        $field = [
            'f.id,f.item_name AS f_item,f.item_name_en AS f_item_en,GROUP_CONCAT(s.item_name) AS s_item'
        ];
        $join = [
            ['pdzg_small_item s','f.id = s.item_type_id','LEFT']
        ];
        $where = [
            'f.status'=>1,
            'f.item_type'=>3
        ];
        $group = 'f.id';
        $result = Db::field($field)->table('pdzg_small_item')->alias('f')->join($join)->where($where)->group($group)->select();
        return $result;
    }
}