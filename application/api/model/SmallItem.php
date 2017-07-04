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
    protected $hidden = [
        'create_time',
        'update_time',
        'status'
    ];
    //获取大分类下的子分类
    public static function getSmallItem(){
        $condition = [
            'item_type' =>3,
            'status'=>1
        ];
        $data = SmallItem::all(function($query) use ($condition){
            $query->where($condition);
        });
        return $data;
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
}