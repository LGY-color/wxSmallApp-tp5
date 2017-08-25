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
            'reply_user_id'=>isset($params['replyid'])?$params['replyid']:'',
            'create_time'=>time(),
            'update_time'=>time()
        ];
        $result = Db::table('pdzg_news')->insert($data);
        return $result;
    }
    //获取未读信息条数
    public static function noReadNum(){
        $condition = [
            'reply_user_id'=>Session::get('userid'),
            'status'=>1,
        ];
        $result = Db::table('pdzg_news')->where($condition)->count('id');
        return $result;
    }
    //查看消息 把未读设置为已读
    public static function getUserNews($page=0){
        $condition = [
            'reply_user_id'=>Session::get('userid'),
            'status'=>['<>',0]
        ];
        $join = [
          ['pdzg_comment c','c.id = n.comment_id']
        ];
        $result = Db::table('pdzg_news')->where($condition)->limit($page,10)->select();
        self::setRead();
        return $result;
    }
    //把未读设置为已读
    public static function setRead(){
        $condition = [
            'reply_user_id'=>Session::get('userid'),
            'status'=>1
        ];
        $update = [
            'status'=>2
        ];
        $result = Db::table('pdzg_news')->where($condition)->update($update);
        return $result;
    }
}