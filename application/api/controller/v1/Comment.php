<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/24
 * Time: 15:18
 */

namespace app\api\controller\v1;


use think\Request;
use app\api\model\Comment AS CommentModel;
class Comment extends Base
{
    //回复评论
    public function infoReply(){
        $request = Request::instance();
        $params = $request->param();
        $result = CommentModel::infoReply($params);
        if($result){
            $res = [
                'code'=>200,
                'msg'=>'操作成功！',
            ];
            return json($res);
        }else{
            throw new DbException([
                'msg'=>'操作失败，请重试！'
            ]);
        }
    }
    //获取当前用户评论信息
    public function getUserComment(){
        $request = Request::instance();
        $params = $request->param();
        $page = $params['page'];
        $result = $this->dealTime(CommentModel::getUserComment($page));
        return json($result);
    }

    //处理查出的数据
    public function dealTime($data){
        foreach ($data as $k=>$value){
            $data[$k]['update_time']= date('Y-m-d H:i:s',$value['update_time']);
        }
        return $data;
    }
}