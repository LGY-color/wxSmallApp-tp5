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

class News extends BaseModel
{
    //回复信息 分别插入comment表和news表
    public static function replyUser($data){
        $result['comment'] = Db::table('pdzg_comment')->insert($data);
        if(!$result['comment']){
            throw new DbException();
        }
        $comment_id = Db::table('pdzg_comment')->getLastInsID();
        $news_data = [
            'user_id'=>$data['user_id'],
            'reply_user_id'=>$data['reply_user_id'],
            'comment_id'=>$comment_id
        ];
        $result['news'] = Db::table('pdzg_news')->insert($news_data);
        if(!$result['news']){
            throw new DbException();
        }
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