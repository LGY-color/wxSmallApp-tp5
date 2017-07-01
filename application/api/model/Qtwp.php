<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/1
 * Time: 14:50
 */

namespace app\api\model;


class Qtwp extends BaseModel
{
    public static function getQtwpTopInfo($limit_num=''){
        $condition = [
            'status'=>1,
            'level_type'=>3
        ];
        $data = Qtwp::all(function($query) use($condition,$limit_num){
            $query->where($condition)->limit($limit_num)->order('update_time', 'desc');
        });
        return $data;
    }
}