<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/3
 * Time: 10:19
 */

namespace app\api\model;


use app\lib\exception\DbException;
use app\lib\exception\MoneyException;
use think\Config;
use think\Db;
use think\Session;

class Info extends BaseModel
{
    protected $autoWriteTimestamp = true;
    //获取sql fetchSql(true)->
    //获取最新信息
    public static function getNewInfo($start=0,$limit=5){
        $field = [
            'i.id AS i_id,i.title,i.update_time,i.ip,i.status AS info_status,i.content',
            'u.id AS uid,u.username',
            'bi.item_name',
            'lv.*,lv.id AS lv_id',
            'url.url AS img_url'
        ];
        $condition = [
            'i.status'=>1,
        ];
        $join = [
            ['pdzg_user u','u.id=i.user_id','LEFT'],
            ['pdzg_big_item bi','bi.id=i.big_item_id','LEFT'],
            ['pdzg_level_type lv','lv.id = i.level_type_id','LEFT'],
            ['pdzg_img_url url','url.info_id = i.id','LEFT']
        ];
        $order = [
            'i.update_time'=>'DESC'
        ];
        $result = Db::field($field)->table('pdzg_info')->alias('i')->where($condition)->join($join)->order($order)->limit($start,$limit)->select();
        return $result;
    }

    //获取置顶信息
    public static function getTopInfo($start=0,$limit=5){
        $field = [
            'i.id AS i_id,i.title,i.update_time,i.ip,i.status AS info_status,i.content',
            'u.id AS uid,u.username',
            'bi.item_name',
            'lv.*,lv.id AS lv_id',
            'url.url AS img_url'
        ];
        $condition = [
            'i.status'=>1,
            'lv.top'=>1
        ];
        $join = [
            ['pdzg_user u','u.id=i.user_id','LEFT'],
            ['pdzg_big_item bi','bi.id=i.big_item_id','LEFT'],
            ['pdzg_level_type lv','lv.id = i.level_type_id','LEFT'],
            ['pdzg_img_url url','url.info_id = i.id','LEFT']
        ];
        $order = [
            'i.update_time'=>'DESC'
        ];
        $result = Db::field($field)->table('pdzg_info')->alias('i')->where($condition)->join($join)->order($order)->limit($start,$limit)->select();
        return $result;
    }

    //获取星级信息
    public static function getStarInfo($start=0,$limit=5){
        $field = [
            'i.id AS i_id,i.title,i.update_time,i.ip,i.status AS info_status,i.content',
            'u.id AS uid,u.username',
            'bi.item_name',
            'lv.*,lv.id AS lv_id',
            'url.url AS img_url'
        ];
        $condition = [
            'i.status'=>1,
            'lv.star'=>1
        ];
        $join = [
            ['pdzg_user u','u.id=i.user_id','LEFT'],
            ['pdzg_big_item bi','bi.id=i.big_item_id','LEFT'],
            ['pdzg_level_type lv','lv.id = i.level_type_id','LEFT'],
            ['pdzg_img_url url','url.info_id = i.id','LEFT']
        ];
        $order = [
            'i.update_time'=>'DESC'
        ];
        $result = Db::field($field)->table('pdzg_info')->alias('i')->where($condition)->join($join)->order($order)->limit($start,$limit)->select();
        return $result;
    }

    //获取小吃盘店
    public static function getXcpdInfo($start=0,$limit=5){
        $field = [
            'i.id AS i_id,i.title,i.update_time,i.ip,i.status AS info_status',
            'u.id AS uid,u.username',
            'bi.item_name',
            'lv.*,lv.id AS lv_id'
        ];
        $condition = [
            'i.status'=>1,
            'bi.id'=>['in',config('typeConfig.xcpd')]
        ];
        $join = [
            ['pdzg_user u','u.id=i.user_id','LEFT'],
            ['pdzg_big_item bi','bi.id=i.big_item_id','LEFT'],
            ['pdzg_level_type lv','lv.id = i.level_type_id','LEFT']
        ];
        $order = [
            'update_time'=>'DESC'
        ];
        $result = Db::field($field)->table('pdzg_info')->alias('i')->where($condition)->join($join)->order($order)->limit($start,$limit)->select();
        return $result;
    }

    //获取招工求职
    public static function getZgqzInfo($start=0,$limit=5){
        $field = [
            'i.id AS i_id,i.title,i.update_time,i.ip,i.status AS info_status',
            'u.id AS uid,u.username',
            'bi.item_name',
            'lv.*,lv.id AS lv_id'
        ];
        $condition = [
            'i.status'=>1,
            'bi.id'=>['in',config('typeConfig.zgqz')]
        ];
        $join = [
            ['pdzg_user u','u.id=i.user_id','LEFT'],
            ['pdzg_big_item bi','bi.id=i.big_item_id','LEFT'],
            ['pdzg_level_type lv','lv.id = i.level_type_id','LEFT']
        ];
        $order = [
            'update_time'=>'DESC'
        ];
        $result = Db::field($field)->table('pdzg_info')->alias('i')->where($condition)->join($join)->order($order)->limit($start,$limit)->select();
        return $result;
    }

    //获取店铺承包
    public static function getDmcbInfo($start=0,$limit=5){
        $field = [
            'i.id AS i_id,i.title,i.update_time,i.ip,i.status AS info_status',
            'u.id AS uid,u.username',
            'bi.item_name',
            'lv.*,lv.id AS lv_id'
        ];
        $condition = [
            'i.status'=>1,
            'bi.id'=>['in',config('typeConfig.dmcb')]
        ];
        $join = [
            ['pdzg_user u','u.id=i.user_id','LEFT'],
            ['pdzg_big_item bi','bi.id=i.big_item_id','LEFT'],
            ['pdzg_level_type lv','lv.id = i.level_type_id','LEFT']
        ];
        $order = [
            'update_time'=>'DESC'
        ];
        $result = Db::field($field)->table('pdzg_info')->alias('i')->where($condition)->join($join)->order($order)->limit($start,$limit)->select();
        return $result;
    }

    //获取二手市场
    public static function getEsscInfo($start=0,$limit=5){
        $field = [
            'i.id AS i_id,i.title,i.update_time,i.ip,i.status AS info_status',
            'u.id AS uid,u.username',
            'bi.item_name',
            'lv.*,lv.id AS lv_id'
        ];
        $condition = [
            'i.status'=>1,
            'bi.id'=>['in',config('typeConfig.essc')]
        ];
        $join = [
            ['pdzg_user u','u.id=i.user_id','LEFT'],
            ['pdzg_big_item bi','bi.id=i.big_item_id','LEFT'],
            ['pdzg_level_type lv','lv.id = i.level_type_id','LEFT']
        ];
        $order = [
            'update_time'=>'DESC'
        ];
        $result = Db::field($field)->table('pdzg_info')->alias('i')->where($condition)->join($join)->order($order)->limit($start,$limit)->select();
        return $result;
    }

    //根据条件筛选
    public static function getConditionInfo($params,$limit=7){
        $field = [
            'i.id AS i_id,i.title,i.update_time,i.ip,i.status AS info_status,i.content',
            'u.id AS uid,u.username',
            'bi.item_name',
            'lv.*,lv.id AS lv_id',
            'url.url AS img_url'
        ];
        $condition = [
            'i.status'=>1,
            'i.big_item_id'=>$params['infoid'],
            'province'=>isset($params['province'])? $params['province'] : '',
            'monthly_rent'=>isset($params['monthly_rent'])? $params['monthly_rent'] : '',
            'day_turnover'=>isset($params['day_turnover'])? $params['day_turnover'] : '',
            'transfer_fee'=>isset($params['transfer_fee'])? $params['transfer_fee'] : '',
            'decoration'=>isset($params['decoration'])? $params['decoration'] : '',
            'surroundings'=>isset($params['surroundings'])? $params['surroundings'] : '',
            'shop_facilities'=>isset($params['shop_facilities'])? $params['shop_facilities'] : '',
            'hold_credentials'=>isset($params['hold_credentials'])? $params['hold_credentials'] : ''
        ];
        $page = $params['page'];
        if($params['lv'] == 1){
            $condition['lv.top'] = 1;
        }
        $condition = array_filter($condition);
        $join = [
            ['pdzg_user u','u.id=i.user_id','LEFT'],
            ['pdzg_big_item bi','bi.id=i.big_item_id','LEFT'],
            ['pdzg_level_type lv','lv.id = i.level_type_id','LEFT'],
            ['pdzg_img_url url','url.info_id = i.id','LEFT']
        ];
        $order = [
            'i.update_time'=>'DESC'
        ];
        $result = Db::field($field)->table('pdzg_info')->alias('i')->where($condition)->join($join)->order($order)->limit($page,$limit)->select();
        return $result;
    }

    //根据id进入详情
    public static function getIdInfo($id){
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
            'i.update_time'=>'DESC',
        ];
        $add = self::clickAdd($id);
        $result = Db::field($field)->table('pdzg_info')->alias('i')->where($condition)->join($join)->order($order)->select();
        return $result;
    }
    //根据id进入详情 带用户
    public static function getInfoById($id){
        $field = [
            'i.*,i.id AS infoid',
            'u.id AS uid,u.username',
            'bi.item_name AS big_item_name',
            'url.id AS id_url,url.url AS img_url'
        ];
        $condition = [
            'i.status'=>['<>',0],
            'i.id'=>$id,
            'i.user_id'=>Session::get('userid')
        ];
        $join = [
            ['pdzg_user u','u.id=i.user_id','LEFT'],
            ['pdzg_big_item bi','bi.id=i.big_item_id','LEFT'],
            ['pdzg_img_url url','url.info_id = i.id','LEFT']
        ];
        $result = Db::field($field)->table('pdzg_info')->alias('i')->where($condition)->join($join)->select();
        return $result;
    }
    //点击量+1
    public static function clickAdd($id){
        $condition = [
            'id'=>$id
        ];
        $result = Db::table('pdzg_info')->where($condition)->setInc('click_num');
        return $result;
    }
    //数据插入
    public static function InsertInfo($params){
        $insert = [
            'user_id'=>Session::get('userid'),
            'big_item_id'=>getItemId($params['classify']),
            'title'=>isset($params['title'])?$params['title']:'',
            'province'=>isset($params['province'])?$params['province']:'',
            'valid_period'=>isset($params['valid_period'])?$params['valid_period']:'',
            'monthly_rent'=>isset($params['monthly_rent'])?$params['monthly_rent']:'',
            'day_turnover'=>isset($params['day_turnover'])?$params['day_turnover']:'',
            'water_electricity'=>isset($params['water_electricity'])?$params['water_electricity']:'',
            'to_serve'=>isset($params['to_serve'])?$params['to_serve']:'',
            'transfer_fee'=>isset($params['transfer_fee'])?$params['transfer_fee']:'',
            'monthly_salary'=>isset($params['monthly_salary'])?$params['monthly_salary']:'',
            'sex'=>isset($params['sex'])?$params['sex']:'',
            'work_experience'=>isset($params['work_experience'])?$params['work_experience']:'',
            'work_skill'=>isset($params['work_skill'])?$params['work_skill']:'',
            'work_hours'=>isset($params['work_hours'])?$params['work_hours']:'',
            'age'=>isset($params['age'])?$params['age']:'',
            'health_status'=>isset($params['health_status'])?$params['health_status']:'',
            'cash_pledge'=>isset($params['cash_pledge'])?$params['cash_pledge']:'',
            'live_conditions'=>isset($params['live_conditions'])?$params['live_conditions']:'',
            'takeaway_status'=>isset($params['takeaway_status'])?$params['takeaway_status']:'',
            'open_hours'=>isset($params['open_hours'])?$params['open_hours']:'',
            'close_hours'=>isset($params['close_hours'])?$params['close_hours']:'',
            'new_old'=>isset($params['new_old'])?$params['new_old']:'',
            'decoration'=>isset($params['decoration'])?$params['decoration']:'',
            'shop_facilities'=>isset($params['shop_facilities'])?$params['shop_facilities']:'',
            'hold_credentials'=>isset($params['hold_credentials'])?$params['hold_credentials']:'',
            'surroundings'=>isset($params['surroundings'])?$params['surroundings']:'',
            'contact_name'=>isset($params['contact_name'])?$params['contact_name']:'',
            'contact_phone'=>isset($params['contact_phone'])?$params['contact_phone']:'',
            'contact_qq'=>isset($params['contact_qq'])?$params['contact_qq']:'',
            'contact_wx'=>isset($params['contact_wx'])?$params['contact_wx']:'',
            'shop_area'=>isset($params['shop_area'])?$params['shop_area']:'',
            'shop_address'=>isset($params['shop_address'])?$params['shop_address']:'',
            'content'=>isset($params['content'])?$params['content']:'',
            'update_time'=>time(),
            'ip'=>getIP()
        ];


//        Db::startTrans();
//        try{
//
//            // 提交事务
//            Db::commit();
//        } catch (\Exception $e) {
//            // 回滚事务
//            Db::rollback();
//        }

        //扣除发布数
        User::minusPublish();
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

    //刷新
    public static function refreshById($id){
        $money = User::getGoldCoinById();
        $cost = config('expenses.refresh');
        if((int)$money >= $cost){
            $params['cost']  = $cost;
            $minus = User::minusGold($params);
            if($minus){
                $result = Db::table('pdzg_info')->where('id',$id)->setField('update_time', time());
                $params['level_type'] = config('order.refresh');
                $params['infoid'] = $id;
                $params['order_money'] = $cost;
                Order::insertOrder($params);
                return $result;
            }
        }else{
            throw new MoneyException([
                'msg'=>'金币不足，请充值！',
                'errorCode'=>'7788'
            ]);
        }
    }
    //设置已成交
    public static function setDeal($id){
        $result = Db::table('pdzg_info')->where('id',$id)->setField('status', 0);
        if($result){
            return $result;
        }else{
            throw new DbException();
        }

    }
    //更新数据
    public static function UpdateInfo($params){
        $condition = [
            'i.id' => $params['infoid'],
            'i.user_id'=>Session::get('userid')
        ];
        $update = [
            'i.big_item_id'=>getItemId($params['classify']),
            'i.title'=>isset($params['title'])?$params['title']:'',
            'i.province'=>isset($params['province'])?$params['province']:'',
            'i.valid_period'=>isset($params['valid_period'])?$params['valid_period']:'',
            'i.monthly_rent'=>isset($params['monthly_rent'])?$params['monthly_rent']:'',
            'i.day_turnover'=>isset($params['day_turnover'])?$params['day_turnover']:'',
            'i.water_electricity'=>isset($params['water_electricity'])?$params['water_electricity']:'',
            'i.to_serve'=>isset($params['to_serve'])?$params['to_serve']:'',
            'i.transfer_fee'=>isset($params['transfer_fee'])?$params['transfer_fee']:'',
            'i.monthly_salary'=>isset($params['monthly_salary'])?$params['monthly_salary']:'',
            'i.sex'=>isset($params['sex'])?$params['sex']:'',
            'i.work_experience'=>isset($params['work_experience'])?$params['work_experience']:'',
            'i.work_skill'=>isset($params['work_skill'])?$params['work_skill']:'',
            'i.work_hours'=>isset($params['work_hours'])?$params['work_hours']:'',
            'i.age'=>isset($params['age'])?$params['age']:'',
            'i.health_status'=>isset($params['health_status'])?$params['health_status']:'',
            'i.cash_pledge'=>isset($params['cash_pledge'])?$params['cash_pledge']:'',
            'i.live_conditions'=>isset($params['live_conditions'])?$params['live_conditions']:'',
            'i.takeaway_status'=>isset($params['takeaway_status'])?$params['takeaway_status']:'',
            'i.open_hours'=>isset($params['open_hours'])?$params['open_hours']:'',
            'i.close_hours'=>isset($params['close_hours'])?$params['close_hours']:'',
            'i.new_old'=>isset($params['new_old'])?$params['new_old']:'',
            'i.decoration'=>isset($params['decoration'])?$params['decoration']:'',
            'i.shop_facilities'=>isset($params['shop_facilities'])?$params['shop_facilities']:'',
            'i.hold_credentials'=>isset($params['hold_credentials'])?$params['hold_credentials']:'',
            'i.surroundings'=>isset($params['surroundings'])?$params['surroundings']:'',
            'i.contact_name'=>isset($params['contact_name'])?$params['contact_name']:'',
            'i.contact_phone'=>isset($params['contact_phone'])?$params['contact_phone']:'',
            'i.contact_qq'=>isset($params['contact_qq'])?$params['contact_qq']:'',
            'i.contact_wx'=>isset($params['contact_wx'])?$params['contact_wx']:'',
            'i.shop_area'=>isset($params['shop_area'])?$params['shop_area']:'',
            'i.shop_address'=>isset($params['shop_address'])?$params['shop_address']:'',
            'i.content'=>isset($params['content'])?$params['content']:'',
//            'i.update_time'=>time(),
            'i.ip'=>getIP(),
            'url.url'=>$params['img_url']
        ];
        $join = [
            ['pdzg_img_url url','url.info_id=i.id','LEFT']
        ];
        $result = Db::table('pdzg_info')->alias('i')->join($join)->where($condition)->update($update);
        if($result){
            return $result;
        }else{
            throw new DbException();
        }
    }

    //查询已经个人发布的信息
    public static function getPublish($start=0,$limit=5){
        $field = [
            'i.id AS i_id,i.title,i.update_time,i.ip,i.status AS info_status,i.content,i.big_item_id',
            'u.id AS uid,u.username',
            'bi.item_name',
            'lv.*,lv.id AS lv_id',
            'url.url AS img_url'
        ];
        $condition = [
            'i.status'=>['<>',0],
            'i.user_id'=>Session::get('userid')
        ];
        $join = [
            ['pdzg_user u','u.id=i.user_id','LEFT'],
            ['pdzg_big_item bi','bi.id=i.big_item_id','LEFT'],
            ['pdzg_level_type lv','lv.id = i.level_type_id','LEFT'],
            ['pdzg_img_url url','url.info_id = i.id','LEFT']
        ];
        $order = [
            'i.update_time'=>'DESC'
        ];
        $result = Db::field($field)->table('pdzg_info')->alias('i')->where($condition)->join($join)->order($order)->limit($start,$limit)->select();
        return $result;
    }

    //根据分类id获取信息
    public static function getInfoByItem($id,$style,$start=0,$limit=7){
        $field = [
            'i.id AS i_id,i.title,i.update_time,i.ip,i.status AS info_status,i.content',
            'u.id AS uid,u.username',
            'bi.item_name',
            'lv.*,lv.id AS lv_id',
            'url.url AS img_url'
        ];

        $condition = [
            'i.status'=>1,
            'i.big_item_id'=>$id
        ];
        if($style == 1){
            $condition['lv.top'] = 1;
        }
        $join = [
            ['pdzg_user u','u.id=i.user_id','LEFT'],
            ['pdzg_big_item bi','bi.id=i.big_item_id','LEFT'],
            ['pdzg_level_type lv','lv.id = i.level_type_id','LEFT'],
            ['pdzg_img_url url','url.info_id = i.id','LEFT']
        ];
        $order = [
            'i.update_time'=>'DESC'
        ];
        $result = Db::field($field)->table('pdzg_info')->alias('i')->where($condition)->join($join)->order($order)->limit($start,$limit)->select();
        return $result;
    }


}