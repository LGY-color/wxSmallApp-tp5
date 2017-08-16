<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/4
 * Time: 9:31
 */

namespace app\api\model;


use think\Db;

class SmallItem extends BaseModel
{
    //根据分类名获取具体的子分类下的条件
    public static function getItemByName($id){
        $field = [
            'ssi.id AS s_id,ssi.item_name AS s_name,ssi.item_name_en AS s_name_en'
        ];
        $condition = [
            'fsi.id'=>$id
        ];
        $join = [
            ['pdzg_small_item ssi','ssi.item_type_id = fsi.id','LEFT']
        ];
        $result = Db::field($field)->table('pdzg_small_item')->alias('fsi')->join($join)->where($condition)->select();
        return $result;
    }
    //大分类下的子分类 包括筛选条件
    public static function getFilterItem($id=''){
        $condition = [
          'f.id' => $id
        ];
        $join = [
            ['pdzg_small_item s','s.item_type_id = f.id','LEFT']
        ];
        $data = Db::table('pdzg_small_item')->alias('f')->join($join)->where($condition)->select();
        return collection($data);
    }

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