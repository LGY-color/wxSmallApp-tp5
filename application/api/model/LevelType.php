<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/22
 * Time: 17:54
 */

namespace app\api\model;


class LevelType
{
    public static function setLevelStatus($params){
        //1.先查看 是否已经存在当前info_id 状态设置 若无新建 有则修改
        //2.计算出要花费的金币
        //3.比对当前用户金币是否足够 不够的话 返回提示
        //4.修改状态 扣除金币
    }
}