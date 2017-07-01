<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/1
 * Time: 11:46
 */

namespace app\api\model;


class Zgxx extends BaseModel
{
    public static function getZgxxTopInfo($limit_num=''){
        $condition = [
            'status'=>1,
            'level_type'=>3
        ];
        $data = Zgxx::all(function($query) use($condition,$limit_num) {
            $query->where($condition)->limit($limit_num)->order('update_time', 'desc');
        });
        return $data;
    }
}