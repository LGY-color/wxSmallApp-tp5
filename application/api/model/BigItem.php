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
    protected $hidden = [
        'create_time',
        'update_time',
        'status'
    ];
    //获取8个大分类
    public static function getBigItem(){
        $condition = [
            'item_type'=>2,
            'status'=>1
        ];
        $data = BigItem::all($condition);
        return $data;
    }

}