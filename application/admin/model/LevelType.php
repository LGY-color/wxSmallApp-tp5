<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/25
 * Time: 16:42
 */

namespace app\admin\model;


use app\lib\exception\DbException;
use app\lib\exception\MoneyException;
use think\Db;

class LevelType extends BaseModel
{
    //查看level
    public static function getLevelStatus($id){
        $result = Db::table('pdzg_level_type')->where('id',$id)->find();
        return $result;
    }
    //设置状态
    public static function setLevelStatus($params=[]){
//        $exist = self::existLevelType($params['lv_id']);
//        if($exist){
            $cost = countExpenses($params);
            $money = User::getGoldCoinById($params['user_id']);
            if((int)$money >= (int)$cost){
                $params['cost'] = $cost;
                Order::createOrder($params);
                return self::updateLevelType($params);
            }else{
                throw new MoneyException();
            }
//        }else{
//            return self::insertLevelType($params);
//        }

    }
    //根据id检查是否存在level记录 Base
    public static function existLevelType($lv_id){
        $exist = Db::table('pdzg_level_type')->where('id',$lv_id)->find();
        return $exist;
    }
    //根据id更新level记录
    public static function updateLevelType($params=[]){
        $condition = [
            'lv.id'=> $params['lv_id']
        ];
        $update = [
            'lv.red'=>isset($params['red'])?$params['red']:0,
            'lv.top'=>isset($params['top'])?$params['top']:0,
            'lv.bold'=>isset($params['bold'])?$params['bold']:0,
            'lv.star'=>isset($params['star'])?$params['star']:0,
            'lv.top_start_time'=>strtotime($params['top_start_time']),
            'lv.top_end_time'=>strtotime($params['top_end_time']) + intval($params['top_time']) * 86400,
            'lv.star_info'=>$params['star_info']
        ];
        $join = [
            ['pdzg_user u','u.id = lv.user_id','LEFT']
        ];
        $result = Db::table('pdzg_level_type')->alias('lv')->join($join)->dec('u.gold_coin',$params['cost'])->where($condition)->update($update);
        if($result){
            return $result;
        }else{
            throw new DbException();
        }
    }
    //id不存在新增记录并且把新增id，存到pdzg_info表中的level_type_id
    public static function insertLevelType($params=[]){
        $info_id = $params['info_id'];
        $user_id = $params['user_id'];
        $data = [
            'info_id'=>$info_id,
            'user_id' => $user_id,
        ];
        $resID = Db::table('pdzg_level_type')->insertGetId($data);
        $condition = [
            'id'=>$info_id,
        ];
        $update = [
            'level_type_id'=>$resID
        ];
        $result = Db::table('pdzg_info')->where($condition)->update($update);
        if($result){
            return $resID;
        }else{
            throw new DbException();
        }
    }
}