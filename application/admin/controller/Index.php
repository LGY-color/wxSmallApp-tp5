<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/10
 * Time: 17:43
 */

namespace app\admin\controller;


use app\admin\model\User as UserModel;
use app\admin\model\Info as InfoModel;
use app\admin\model\Comment as CommentModel;
class Index
{
    public function index(){
        $result['user_count'] = UserModel::getUserCount();
        $result['user_new_count'] = UserModel::getUserTodayNew();
        $result['info_count'] = InfoModel::getInfoCount();
        $result['info_new_count'] = InfoModel::getInfoTodayNew();
        $result['comment_count'] = CommentModel::getCommentCount();
        $result['comment_new_count'] = CommentModel::getCommentTodayNew();
        return json($result);
    }
}