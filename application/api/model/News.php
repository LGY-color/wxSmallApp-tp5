<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/6
 * Time: 11:26
 */

namespace app\api\model;


use app\lib\exception\DbException;
use think\Db;
use think\Session;

class News extends BaseModel
{
    //回复信息插入 news
    public static function replyUser($params){
        $data = [
            'info_id'=>(int)$params['infoid'],
            'user_id'=>Session::get('userid'),
            'comment_id'=>$params['comment_id'],
            'reply_user_id'=>isset($params['reply_user_id'])?$params['reply_user_id']:'',
            'create_time'=>time(),
            'update_time'=>time()
        ];
        $result = Db::table('pdzg_news')->insert($data);
        return $result;
    }
    //获取未读信息条数
    public static function noReadNum($id){
        $condition = [
            'user_id'=>$id,
            'status'=>1,
        ];
        $result = Db::table('pdzg_news')->where($condition)->count('id');
        return $result;
    }
}