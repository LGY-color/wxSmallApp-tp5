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
    //根据当前信息获取评论信息
    public static function getComment($infoId){
        $field = [
            'c.id as c_id,u.username as u_name,u.id as uid,u.code_id,c.update_time,c.content,ur.username as ur_name,ur.id as urid'
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
        $result = Db::field($field)->table('pdzg_comment')->alias('c')->join($join)->where($condition)->order($order)->select();
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
        }
        $commentId = Db::table('pdzg_comment')->insertGetId($data);
        $params['comment_id'] = $commentId;
        $result = News::replyUser($params);
        if($result){
            return $result;
        }else{
            throw new DbException();
        }

    }
    //获取用户评论信息
    public static function getUserComment($id){
        $condition = [
            'user_id'=>$id,
            'status'=>1
        ];
        $order = [
            'update_time DESC'
        ];
        $result = Db::table('pdzg_comment')->where($condition)->order($order)->select();
        return $result;
    }
}