<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/5
 * Time: 17:39
 */

namespace app\api\model;


use app\lib\exception\DbException;
use think\Db;
use think\Session;

class Comment extends BaseModel
{
    //根据当前info_id信息获取评论信息
    public static function getComment($infoId,$page=0){
        $field = [
            'c.id as c_id,u.username as u_name,u.id as uid,u.code_id,c.update_time,c.content,ur.username as ur_name,ur.id as urid,u.img_url AS uimg'
        ];
        $condition = [
            'c.info_id'=>$infoId,
            'c.status'=>1
        ];
        $order = [
            'c.update_time'=>'DESC'
        ];
        $join = [
            ['pdzg_user u','c.user_id = u.id','LEFT'],
            ['pdzg_user ur','c.reply_user_id = ur.id','LEFT']
        ];
        $result = Db::field($field)->table('pdzg_comment')->alias('c')->join($join)->where($condition)->order($order)->limit($page,10)->select();
        return $result;
    }
    //用户回复评论
    public static function infoReply($params){
        $data = [
            'info_id'=>$params['infoid'],
            'user_id'=>Session::get('userid'),
            'content'=>$params['content'],
            'ip'=>getIP(),
            'create_time'=>time(),
            'update_time'=>time()
        ];
        if(isset($params['replyid'])){
            $data['reply_user_id'] = $params['replyid'];
        }else{
            $data['reply_user_id'] = $params['authorid'];
        }
        $result = Db::table('pdzg_comment')->insert($data);
//        改成当comment表操作 不使用news表
//        $params['comment_id'] = $commentId;
//        $result = News::replyUser($params);
        if($result){
            return $result;
        }else{
            throw new DbException();
        }

    }
    //获取用户评论信息
    public static function getUserComment($page=0){
        $field = [
            'c.id as c_id,u.username as u_name,u.id as uid,u.code_id,c.update_time,c.content,ur.username as ur_name,ur.id as urid,u.img_url AS uimg,c.info_id'
        ];
        $condition = [
            'c.user_id'=>Session::get('userid'),
            'c.status'=>1
        ];
        $order = [
            'c.update_time'=>'DESC'
        ];
        $join = [
            ['pdzg_user u','c.user_id = u.id','LEFT'],
            ['pdzg_user ur','c.reply_user_id = ur.id','LEFT']
        ];
        $result = Db::field($field)->table('pdzg_comment')->alias('c')->join($join)->where($condition)->order($order)->limit($page,10)->select();
        return $result;
    }
    //获取未读信息条数
    public static function noReadNum(){
        $condition = [
            'reply_user_id'=>Session::get('userid'),
            'read'=>1,
        ];
        $result = Db::table('pdzg_comment')->where($condition)->count('id');
        return $result;
    }
    //获取用户消息 未读read 1 已读read 2
    public static function getUserNews($page=0){
        $field = [
            'c.id as c_id,u.username as u_name,u.id as uid,u.code_id,c.update_time,c.content,ur.username as ur_name,ur.id as urid,u.img_url AS uimg,c.info_id'
        ];
        $condition = [
            'c.reply_user_id'=>Session::get('userid'),
            'c.read'=>['<>','0'],
            'c.status'=>1
        ];
        $order = [
            'c.update_time'=>'DESC'
        ];
        $join = [
            ['pdzg_user u','c.user_id = u.id','LEFT'],
            ['pdzg_user ur','c.reply_user_id = ur.id','LEFT']
        ];
        $result = Db::field($field)->table('pdzg_comment')->alias('c')->join($join)->where($condition)->order($order)->limit($page,10)->select();
        self::setRead();
        return $result;
    }
    //把未读设置为已读
    public static function setRead(){
        $condition = [
            'reply_user_id'=>Session::get('userid'),
            'read'=>1
        ];
        $update = [
            'read'=>2
        ];
        $result = Db::table('pdzg_comment')->where($condition)->update($update);
        return $result;
    }
}