<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/10
 * Time: 20:30
 */

namespace app\admin\model;


use app\lib\exception\DbException;
use app\lib\exception\MoneyException;
use think\Db;

class Info extends BaseModel
{
    //fetchSql(true)->
    //获取发布信息
    public static function getInfoCount(){
        $condition = [
            'status'=>'1'
        ];
        $count = Db::table('pdzg_info')->where($condition)->count('id');
        return $count;
    }

    //获取今日发布信息
    public static function getInfoTodayNew(){
        $beginToday=mktime(0,0,0,date('m'),date('d'),date('Y'));
        $condition = [
            'status'=>1,
            'update_time'=>['>=',$beginToday]
        ];
        $count = Db::table('pdzg_info')->where($condition)->count();
        return $count;
    }
    //获取最新信息
    public static function getNewInfo($limit=5){
        $field = [
            'i.id,i.title,i.update_time',
            'u.id AS uid,u.username',
        ];
        $condition = [
            'i.status'=>'1'
        ];
        $join = [
            ['pdzg_user u','u.id=i.user_id','LEFT'],
        ];
        $order = [
            'update_time'=>'DESC'
        ];
        $result = Db::field($field)->table('pdzg_info')->alias('i')->where($condition)->join($join)->limit($limit)->order($order)->select();
        return $result;
    }
    //获取信息列表
    public static function getInfoList(){
        $field = [
            'i.id AS i_id,i.title,i.update_time,i.ip,i.status AS info_status',
            'u.id AS uid,u.username',
            'bi.item_name',
            'lv.*,lv.id AS lv_id'
        ];
        $condition = [
            'i.status'=>['<>','0']
        ];
        $join = [
            ['pdzg_user u','u.id=i.user_id','LEFT'],
            ['pdzg_big_item bi','bi.id=i.big_item_id','LEFT'],
            ['pdzg_level_type lv','lv.id = i.level_type_id','LEFT']
        ];
        $order = [
            'update_time'=>'DESC'
        ];
        $result = Db::field($field)->table('pdzg_info')->alias('i')->where($condition)->join($join)->order($order)->paginate(10);
        return $result;
    }
    //根据id获取详细信息
    public static function getInfoDetailById($id){
        $field = [
            'i.*,i.id AS i_id',
            'u.id AS uid,u.username',
            'bi.item_name AS big_item_name',
            'url.id AS id_url,url.url AS img_url',
            'lv.*,lv.id AS lv_id'
        ];
        $condition = [
            'i.status'=>['<>',0],
            'i.id'=>$id,
        ];
        $join = [
            ['pdzg_user u','u.id=i.user_id','LEFT'],
            ['pdzg_big_item bi','bi.id=i.big_item_id','LEFT'],
            ['pdzg_level_type lv','i.level_type_id = lv.id','LEFT'],
            ['pdzg_img_url url','url.info_id = i.id','LEFT'],
        ];
        $order = [
            'update_time'=>'DESC',
        ];
        $result = Db::field($field)->table('pdzg_info')->alias('i')->where($condition)->join($join)->order($order)->select();
        return $result;
    }
    //根据id更新信息
    public static function updateInfoById($params=[]){
        $condition = [
            'i.id' => $params['i_id']
        ];
        if($params['url_id'] ==''){
            $url_id = ImgUrl::createImgUrl($params);
        }else{
            $update['url.id'] = $params['url_id'];
        }
        $update = [
            'i.title'=>$params['title'],
            'i.province'=>$params['province'],
            'i.valid_period'=>$params['valid_period'],
            'i.monthly_rent'=>$params['monthly_rent'],
            'i.day_turnover'=>$params['day_turnover'],
            'i.water_electricity'=>$params['water_electricity'],
            'i.to_serve'=>$params['to_serve'],
            'i.transfer_fee'=>$params['transfer_fee'],
            'i.monthly_salary'=>$params['monthly_salary'],
            'i.sex'=>$params['sex'],
            'i.work_experience'=>$params['work_experience'],
            'i.work_skill'=>$params['work_skill'],
            'i.work_hours'=>$params['work_hours'],
            'i.age'=>$params['age'],
            'i.health_status'=>$params['health_status'],
            'i.cash_pledge'=>$params['cash_pledge'],
            'i.live_conditions'=>$params['live_conditions'],
            'i.takeaway_status'=>$params['takeaway_status'],
            'i.open_hours'=>$params['open_hours'],
            'i.close_hours'=>$params['close_hours'],
            'i.new_old'=>$params['new_old'],
            'i.decoration'=>$params['decoration'],
            'i.shop_facilities'=>$params['shop_facilities'],
            'i.hold_credentials'=>$params['hold_credentials'],
            'i.surroundings'=>$params['surroundings'],
            'i.contact_name'=>$params['contact_name'],
            'i.contact_phone'=>$params['contact_phone'],
            'i.contact_qq'=>$params['contact_qq'],
            'i.email'=>$params['email'],
            'i.shop_area'=>$params['shop_area'],
            'i.shop_address'=>$params['shop_address'],
            'i.content'=>$params['content'],
            'i.ip'=>getIP(),
            'url.url'=>$params['img_url'],
            'url.info_id'=>$params['i_id']
        ];
        $join = [
            ['pdzg_img_url url','url.info_id=i.id','LEFT']
        ];
        $result = Db::table('pdzg_info')->alias('i')->join($join)->where($condition)->update($update);
        return $result;

    }
    //根据id刷新
    public static function refreshById($params=[]){
        $money = User::getGoldCoinById($params['user_id']);
        $params['refresh'] = 1;
        $cost = countExpenses($params);
        if((int)$money >= (int)$cost){
            $condition = [
                'i.id'=>$params['info_id']
            ];
            $update = [
                'i.update_time'=>time()
            ];
            $join = [
                ['pdzg_user u','u.id = i.user_id','LEFT']
            ];
            $result = Db::table('pdzg_info')->alias('i')->join($join)->dec('u.gold_coin',$cost)->where($condition)->update($update);
            if($result){
                return $result;
            }else{
                throw new DbException();
            }
        }else{
            throw new MoneyException();
        }

    }
    //根据id删除
    public static function deleteById($params=[]){
        $condition = [
            'id'=>$params['info_id']
        ];
        $update = [
            'status'=>0
        ];
        $result = Db::table('pdzg_info')->where($condition)->update($update);
        if($result){
            return $result;
        }else{
            throw new DbException();
        }
    }
    //新增信息
    public static function addNews($params=[]){
        $insert = [
            'title'=>$params['title'],
            'big_item_id'=>$params['big_item'],
            'province'=>$params['province'],
            'valid_period'=>$params['valid_period'],
            'monthly_rent'=>$params['monthly_rent'],
            'day_turnover'=>$params['day_turnover'],
            'water_electricity'=>$params['water_electricity'],
            'to_serve'=>$params['to_serve'],
            'transfer_fee'=>$params['transfer_fee'],
            'monthly_salary'=>$params['monthly_salary'],
            'sex'=>$params['sex'],
            'work_experience'=>$params['work_experience'],
            'work_skill'=>$params['work_skill'],
            'work_hours'=>$params['work_hours'],
            'age'=>$params['age'],
            'health_status'=>$params['health_status'],
            'cash_pledge'=>$params['cash_pledge'],
            'live_conditions'=>$params['live_conditions'],
            'takeaway_status'=>$params['takeaway_status'],
            'open_hours'=>$params['open_hours'],
            'close_hours'=>$params['close_hours'],
            'new_old'=>$params['new_old'],
            'decoration'=>$params['decoration'],
            'shop_facilities'=>$params['shop_facilities'],
            'hold_credentials'=>$params['hold_credentials'],
            'surroundings'=>$params['surroundings'],
            'contact_name'=>$params['contact_name'],
            'contact_phone'=>$params['contact_phone'],
            'contact_qq'=>$params['contact_qq'],
            'contact_wx'=>$params['contact_wx'],
            'shop_area'=>$params['shop_area'],
            'shop_address'=>$params['shop_address'],
            'content'=>$params['content'],
            'update_time'=>time(),
            'ip'=>getIP()
        ];
        $id = Db::table('pdzg_info')->insertGetId($insert);
        $insertImg = [
            'url'=>$params['img_url'],
            'info_id'=>$id
        ];
        $result = Db::table('pdzg_img_url')->data($insertImg)->insert();
        if($result){
            return $result;
        }else{
            throw new DbException();
        }

    }
    //搜索信息列表
    public static function searchInfo($params=[]){
        $field = [
            'i.id AS i_id,i.title,i.update_time,i.ip',
            'u.id AS uid,u.username',
            'bi.item_name',
            'lv.*,lv.id AS lv_id'
        ];
        $condition = [
            'i.status'=>'1',
            'i.title'=>['LIKE','%'.$params['title'].'%']

        ];
        $join = [
            ['pdzg_user u','u.id=i.user_id','LEFT'],
            ['pdzg_big_item bi','bi.id=i.big_item_id','LEFT'],
            ['pdzg_level_type lv','lv.id = i.level_type_id','LEFT']
        ];
        $order = [
            'update_time'=>'DESC'
        ];
        $result = Db::field($field)->table('pdzg_info')->alias('i')->where($condition)->join($join)->order($order)->paginate(10);
        return $result;
    }
    //根据id修改评论状态
    public static function updateStatus($params=[]){
        $condition = [
            'id'=>$params['info_id']
        ];
        $update = [
            'status'=>$params['info_status']
        ];
        $result = Db::table('pdzg_info')->where($condition)->update($update);
        if($result){
            return $result;
        }else{
            throw new DbException();
        }
    }

}