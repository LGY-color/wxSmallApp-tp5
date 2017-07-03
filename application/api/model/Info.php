<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/3
 * Time: 10:19
 */

namespace app\api\model;


use think\Db;

class Info extends BaseModel
{
//    获取sql fetchSql(true)->
    //获取置顶信息
    public static function getTopInfo($limit=''){
        $field = [
            'i.*',
            'bi.item_name,bi.id as bi_id'
        ];
        $condition = [
            'i.level_type' => config('typeConfig.top'),
            'i.status'=>1
        ];
        $join = [
          ['pdzg_big_item bi','bi.id=i.big_item_id','LEFT']
        ];
        $order = [
            'update_time DESC'
        ];
        $data = Db::field($field)->table('pdzg_info')->alias('i')->join($join)->limit($limit)->where($condition)->order($order)->select();
        return $data;
    }

    //获取星级信息
    public static function getStarInfo($limit=''){
        $field = [
            'i.*',
            'bi.item_name,bi.id as bi_id'
        ];
        $condition = [
            'i.level_type' => config('typeConfig.star'),
            'i.status'=>1
        ];
        $join = [
            ['pdzg_big_item bi','bi.id=i.big_item_id','LEFT']
        ];
        $order = [
            'update_time DESC'
        ];
        $data = Db::field($field)->table('pdzg_info')->alias('i')->join($join)->limit($limit)->where($condition)->order($order)->select();
        return $data;
    }
    //获取小吃盘店
    public static function getXcpdInfo($limit=''){
        $field = [
            'i.*',
            'bi.item_name,bi.id as bi_id'
        ];
        $condition = [
            'i.level_type' => config('typeConfig.normal'),
            'i.status'=>1,
            'bi.id'=>['in',config('typeConfig.xcpd')]
        ];
        $join = [
            ['pdzg_big_item bi','bi.id=i.big_item_id','LEFT']
        ];
        $order = [
            'update_time DESC'
        ];
        $data = Db::field($field)->table('pdzg_info')->alias('i')->join($join)->limit($limit)->where($condition)->order($order)->select();
        return $data;
    }
    //获取招工求职
    public static function getZgqzInfo($limit=''){
        $field = [
            'i.*',
            'bi.item_name,bi.id as bi_id'
        ];
        $condition = [
            'i.level_type' => config('typeConfig.normal'),
            'i.status'=>1,
            'bi.id'=>['in',config('typeConfig.zgqz')]
        ];
        $join = [
            ['pdzg_big_item bi','bi.id=i.big_item_id','LEFT']
        ];
        $order = [
            'update_time DESC'
        ];
        $data = Db::field($field)->table('pdzg_info')->alias('i')->join($join)->limit($limit)->where($condition)->order($order)->select();
        return $data;
    }
    //获取店铺承包
    public static function getDmcbInfo($limit=''){
        $field = [
            'i.*',
            'bi.item_name,bi.id as bi_id'
        ];
        $condition = [
            'i.level_type' => config('typeConfig.normal'),
            'i.status'=>1,
            'bi.id'=>['in',config('typeConfig.dmcb')]
        ];
        $join = [
            ['pdzg_big_item bi','bi.id=i.big_item_id','LEFT']
        ];
        $order = [
            'update_time DESC'
        ];
        $data = Db::field($field)->table('pdzg_info')->alias('i')->join($join)->limit($limit)->where($condition)->order($order)->select();
        return $data;
    }
    //获取二手市场
    public static function getEsscInfo($limit=''){
        $field = [
            'i.*',
            'bi.item_name,bi.id as bi_id'
        ];
        $condition = [
            'i.level_type' => config('typeConfig.normal'),
            'i.status'=>1,
            'bi.id'=>['in',config('typeConfig.essc')]
        ];
        $join = [
            ['pdzg_big_item bi','bi.id=i.big_item_id','LEFT']
        ];
        $order = [
            'update_time DESC'
        ];
        $data = Db::field($field)->table('pdzg_info')->alias('i')->join($join)->limit($limit)->where($condition)->order($order)->select();
        return $data;
    }
}