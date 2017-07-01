<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/1
 * Time: 15:15
 */

namespace app\api\model;


use think\Db;

class AllItem extends BaseModel
{
    public static function getAllItemTopInfo($limit_num=''){
        $table = [
            'pdzg_dpzr'=>'dpzr',
            'pdzg_xqcb'=>'xqcb'
        ];
        $condition = [
            'dpzr.status'=>1,
            'dpzr.level_type'=>3,
            'xqcb.status'=>1,
            'xqcb.level_type'=>3
        ];
        $field = [
            'dpzr.*',
            'xqcb.*'
        ];
        $data = Db::field($field)->table($table)->where($condition)->limit($limit_num)->select();
        return $data;
    }
}