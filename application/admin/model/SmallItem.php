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
        $result = Db::table('pdzg_small_item');
    }
}