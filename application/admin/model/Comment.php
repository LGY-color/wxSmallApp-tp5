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
        $condition = [
            'status'=>'1'
        ];
        $order = [
            'update_time'=>'DESC'
        ];
        $result = Db::table('pdzg_comment')->where($condition)->limit($limit)->order($order)->select();
        return $result;
    }
}