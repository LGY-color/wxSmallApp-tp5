<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/29
 * Time: 11:27
 */

namespace app\admin\controller;


use think\Controller;
use app\admin\model\Comment as CommentModel;
use think\Request;

class Comment extends BaseController
{
    //评论列表
    public function comment(){
        $data = CommentModel::getCommentList();
        $page = $data->render();
//        var_dump($data);
//        return json($data);
        $this->assign('page',$page);
        $this->assign('result',$data);
        return $this->fetch();
    }
    //更新评论状态
    public function updateStatus(){
        $request = Request::instance();
        $params = $request->param();
        $result = CommentModel::updateStatus($params);
        if($result){
            return adminRes('1','操作成功');
        }else{
            return adminRes('0','操作失败，请重试');
        }
    }
    //根据评论内容查找
    public function searchComment(){
        $request = Request::instance();
        $params = $request->param();
        $data = CommentModel::searchComment($params);
        $page = $data->render();
//        var_dump($data);
//        return json($data);
        $this->assign('page',$page);
        $this->assign('result',$data);
        return $this->fetch('search');
    }
}