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
        $field = [
            'dpzr.id,dpzr.user_id,dpzr.province,dpzr.valid_period,dpzr.title,dpzr.monthly_rent,dpzr.day_turnover,dpzr.transfer_fee,dpzr.content,dpzr.img_id,dpzr.contact_name,dpzr.contact_phone,dpzr.contact_qq,dpzr.shop_area,dpzr.water_electricity,dpzr.to_serve,dpzr.surroundings,dpzr.shop_facilities,dpzr.hold_credentials,dpzr.shop_address,dpzr.update_time,dpzr.security_deposit',
            'xqcb.id,xqcb.user_id,xqcb.province,xqcb.valid_period,xqcb.title,xqcb.monthly_rent,xqcb.day_turnover,xqcb.content,xqcb.img_id,xqcb.contact_name,xqcb.contact_phone,xqcb.contact_qq, xqcb.shop_area,xqcb.water_electricity,xqcb.to_serve,xqcb.surroundings,xqcb.shop_facilities,xqcb.hold_credentials,xqcb.shop_address,xqcb.security_deposit,xqcb.update_time',
           ];
        $join = [
            ['pdzg_dpzr dpzr','top.dpzr_id=dpzr.id','LEFT'],
            ['pdzg_xqcb xqcb','top.xqcb_id=xqcb.id','LEFT']
        ];
//        $data = Db::field('*')->table($table)->where($condition)->limit($limit_num)->select();
        $data = Db::field($field)->table('pdzg_top_info')->alias('top')->join($join)->limit($limit_num)->select();
        return $data;

    }
}