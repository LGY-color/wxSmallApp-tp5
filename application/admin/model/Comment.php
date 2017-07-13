<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/10
 * Time: 20:32
 */

namespace app\admin\model;

use think\Db;
class Comment extends BaseModel
{
    //获取评论总数
    public static function getCommentCount(){
        $condition = [
            'status'=>'1'
        ];
        $count = Db::table('pdzg_comment')->where($condition)->count('id');
        return $count;
    }

    //获取今日评论数
    public static function getCommentTodayNew(){
        $beginToday=mktime(0,0,0,date('m'),date('d'),date('Y'));
        $condition = [
            'status'=>1,
            'update_time'=>['>=',$beginToday]
        ];
        $count = Db::table('pdzg_comment')->where($condition)->count();
        return $count;
    }
    //获取最新评论
    public static function getNewComment($limit=5){
        $field = [
            'c.id,c.content,c.info_id,c.update_time',
            'u.id AS uid,u.username AS uname',
            'ru.id AS ruid,ru.username As runame'
        ];
        $join = [
            ['pdzg_user u','u.id = c.user_id','LEFT'],
            ['pdzg_user ru','ru.id = c.reply_user_id','LEFT']
        ];
        $condition = [
            'c.status'=>'1'
        ];
        $order = [
            'update_time'=>'DESC'
        ];
        $result = Db::field($field)->table('pdzg_comment')->alias('c')->join($join)->where($condition)->limit($limit)->order($order)->select();
        return $result;
    }
}