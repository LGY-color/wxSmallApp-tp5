<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/1
 * Time: 11:35
 */

namespace app\api\model;

//求转店铺
class Qzdp extends BaseModel
{
    //    获取置顶信息
    public static function getQzdpTopInfo($limit_num=''){
        $condition = [
            'status' =>1,
            'level_type'=>3
        ];
        $data = Qzdp::all(function($query) use($condition,$limit_num) {
            $query->where($condition)->limit($limit_num)->order('update_time', 'desc');
        });
        return $data;
    }
}