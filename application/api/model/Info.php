<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/3
 * Time: 10:19
 */

namespace app\api\model;


use app\lib\exception\DbException;
use think\Db;

class Info extends BaseModel
{
    protected $autoWriteTimestamp = true;
//    获取sql fetchSql(true)->
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
    public static function getConditionInfo($params,$limit=10){
        $field = [
            'i.id AS i_id,i.title,i.update_time,i.ip,i.status AS info_status,i.content',
            'u.id AS uid,u.username',
            'bi.item_name',
            'lv.*,lv.id AS lv_id',
            'url.url AS img_url'
        ];

        $condition = [
            'i.status'=>1,
            'i.big_item_id'=>$params['id'],
            'province'=>isset($params['province'])? $params['province'] : '',
            'monthly_rent'=>isset($params['monthly_rent'])? $params['monthly_rent'] : '',
            'day_turnover'=>isset($params['day_turnover'])? $params['day_turnover'] : '',
            'transfer_fee'=>isset($params['transfer_fee'])? $params['transfer_fee'] : '',
            'decoration'=>isset($params['decoration'])? $params['decoration'] : '',
            'surroundings'=>isset($params['surroundings'])? $params['surroundings'] : '',
            'shop_facilities'=>isset($params['shop_facilities'])? $params['shop_facilities'] : '',
            'hold_credentials'=>isset($params['hold_credentials'])? $params['hold_credentials'] : ''
        ];
        $condition = array_filter($condition);
        if($params['style'] == 1){
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
        $result = Db::field($field)->table('pdzg_info')->alias('i')->where($condition)->join($join)->order($order)->limit(0,$limit)->select();
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
            'update_time'=>'DESC',
        ];
        $result = Db::field($field)->table('pdzg_info')->alias('i')->where($condition)->join($join)->order($order)->select();
        return $result;
    }

    //数据插入
    public static function InsertInfo($list){
        $info = Info::create($list);
        $result = $info->id;
        return $result;
    }

    //更新数据
    public static function UpdateInfo($list){
        $info = new Info();
        $condition = [
            'user_id'=>$list['user_id'],
            'id'=>$list['id']
        ];
        $have = $info->get($condition);
        if($have){
            $data = [
              $list
            ];
            $result = $info->saveAll($data);
            return $result;
        }
        return $have;
    }

    //查询已经个人发布的信息
    public static function getPublish($id){
        $info = new Info();
        $condition = [
            'user_id' =>$id
        ];
        $result = $info->all(function($query) use ($condition){
            $query->where($condition)->order('update_time','DESC');
        });
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