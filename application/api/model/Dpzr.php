<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/1
 * Time: 11:06
 */

namespace app\api\model;

//店铺转让
class Dpzr extends BaseModel
{
    //    获取置顶信息
    public static function getDpzrTopInfo($limit_num=''){
        $condition = [
            'status'=>1,
            'level_type'=>3
        ];
        $data = Dpzr::all(function($query) use($condition,$limit_num) {
            $query->where($condition)->limit($limit_num)->order('update_time', 'desc');
        });
        return $data;
    }
    //获取星级信息
    public static function getDpzrStarInfo($limit_num=''){
        $condition = [
            'status'=>1,
            'level_type'=>3
        ];
        $data = Dpzr::all(function($query) use($condition,$limit_num) {
            $query->where($condition)->limit($limit_num)->order('update_time', 'desc');
        });
        return $data;
    }
}