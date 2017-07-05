<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/1
 * Time: 23:16
 */
return [
//    店铺转让字段
    'DPZR_FIELD' => 'i.id,i.user_id,i.province,i.valid_period,i.title,i.monthly_rent,i.day_turnover,i.transfer_fee,i.content,i.img_id,i.contact_name,i.contact_phone,i.contact_qq,i.shop_area,i.water_electricity,i.to_serve,i.surroundings,i.shop_facilities,i.hold_credentials,i.shop_address,i.update_time,i.security_deposit',
    'QZDP_FIELD' => 'i.id,i.user_id,i.province,i.valid_period,i.title,i.monthly_rent,i.day_turnover,i.transfer_fee,i.content,i.img_id,i.contact_name,i.contact_phone,i.contact_qq,i.shop_area,i.water_electricity,i.to_serve,i.surroundings,i.shop_facilities,i.hold_credentials,i.shop_address,i.update_time,i.security_deposit',
    'FIELD' => [
        'i.*',
        'bi.item_name,bi.id as bi_id',
        's1.item_name as valid_period',
        's2.item_name as monthly_rent',
        's3.item_name as day_turnover',
        's4.item_name as transfer_fee',
        's5.item_name as monthly_salary',
        's6.item_name as sex',
        's7.item_name as work_experience',
        's8.item_name as work_skill',
        's9.item_name as work_hours',
        's10.item_name as age',
        's11.item_name as health_status',
        's12.item_name as cash_pledge',
        's13.item_name as live_conditions',
        's14.item_name as takeaway_status',
        's15.item_name as open_hours',
        's16.item_name as close_hours',
        's17.item_name as new_old',
        's18.item_name as water_electricity',
        's19.item_name as to_serve'
    ],
    'JOIN'=>[
        ['pdzg_big_item bi','bi.id=i.big_item_id','LEFT'],
        ['pdzg_small_item s1','i.valid_period=s1.id'],
        ['pdzg_small_item s2','i.monthly_rent=s2.id',],
        ['pdzg_small_item s3','i.day_turnover=s3.id',],
        ['pdzg_small_item s4','i.transfer_fee=s4.id',],
        ['pdzg_small_item s5','i.monthly_salary=s5.id',],
        ['pdzg_small_item s6','i.sex=s6.id',],
        ['pdzg_small_item s7','i.work_experience=s7.id',],
        ['pdzg_small_item s8','i.work_skill=s8.id',],
        ['pdzg_small_item s9','i.work_hours=s9.id',],
        ['pdzg_small_item s10','i.age=s10.id',],
        ['pdzg_small_item s11','i.health_status=s11.id',],
        ['pdzg_small_item s12','i.cash_pledge=s12.id',],
        ['pdzg_small_item s13','i.live_conditions=s13.id',],
        ['pdzg_small_item s14','i.takeaway_status=s14.id',],
        ['pdzg_small_item s15','i.open_hours=s15.id',],
        ['pdzg_small_item s16','i.close_hours=s16.id',],
        ['pdzg_small_item s17','i.new_old=s17.id',],
        ['pdzg_small_item s18','i.water_electricity=s18.id',],
        ['pdzg_small_item s19','i.to_serve=s19.id',]
    ],
];