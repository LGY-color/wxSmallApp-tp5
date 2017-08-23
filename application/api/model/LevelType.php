<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/22
 * Time: 17:54
 */

namespace app\api\model;


use app\lib\exception\DbException;
use app\lib\exception\MoneyException;
use think\Db;
use think\Session;

class LevelType
{
    public static function setLevel($params){
        //1.先查看 是否已经存在当前info_id 状态设置 若无新建 有则修改
        //2.计算出要花费的金币
        //3.比对当前用户金币是否足够 不够的话 返回提示
        //4.修改状态 扣除金币
        $existId = self::existInfoId($params);
        $params['id'] = $existId['id'];
        if($params['level'] == config('order.top')){
            $params['top'] = 1;
        }
        if($params['level'] == config('order.red')){
            $params['red'] = 1;
        }
        if($params['level'] == config('order.bold')){
            $params['bold'] = 1;
        }
        $cost = countExpenses($params);
        $gold = User::getGoldCoinById();
        $gold = $gold['gold_coin'];
        if((int)$cost <= (int)$gold){
            $params['cost'] = $cost;
            if($existId){
                $result = self::setLevelStatus($params);
            }else{
                $result = self::addNew($params);
            }
        }else{
            throw new MoneyException([
                'msg'=>'金币不足，请充值！'
            ]);
        }
        return $result;
    }
    public static function setLevelStatus($params){
        $data = [];
        if(isset($params['top'])){
            $data['top'] = $params['top'];
            $data['top_start_time'] =time();
            $data['top_end_time'] =  86400 * $params['top_time'] + time();
        }
        if(isset($params['red'])){
            $data['red'] = $params['red'];
        }
        if(isset($params['bold'])){
            $data['bold'] = $params['bold'];
        }
        $condition = [
            'id'=>$params['id']
        ];
        $minus = User::minusGold($params);
        if($minus){
            $result = Db::table('pdzg_level_type')->where($condition)->update($data);
        }else{
            throw new DbException();
        }
        return $result;
    }
    //查询info_id是否存在
    public static function existInfoId($params){
        $field = [
            'id'
        ];
        $condition = [
            'info_id'=>$params['infoid']
        ];
        $result = Db::field($field)->table('pdzg_level_type')->where($condition)->find();
        return $result;
    }
    //info_id不存在 新建
    public static function addNew($params){
        $data = [
            'user_id'=>Session::get('userid'),
            'info_id'=>$params['infoid'],
        ];
        if(isset($params['top'])){
            $data['top'] = $params['top'];
            $data['top_start_time'] =time();
            $data['top_end_time'] =  86400 * $params['top_time'] + time();
        }
        if(isset($params['red'])){
            $data['red'] = $params['red'];
        }
        if(isset($params['bold'])){
            $data['bold'] = $params['bold'];
        }
        $minus = User::minusGold($params);
//        throw new DbException([
//           'msg'=>gettype($data)
//        ]);
        if($minus){
            $levelId = Db::table('pdzg_level_type')->insertGetId($data);
            $result = Db::table('pdzg_info')->where('id',$data['info_id'])->update(['level_type_id'=>$levelId]);
        }else{
            throw new DbException();
        }
        return $result;
    }
}