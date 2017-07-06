<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/5
 * Time: 9:56
 */

namespace app\api\controller\v1;


use app\api\model\Collection;
use app\api\model\News;
use app\api\validate\IDMustBePositiveInt;
use think\Controller;
use app\api\model\Info as InfoModel;
use app\api\model\Comment;
use think\Request;

class Base extends Controller
{
    //根据id进入详细
    public function getIdInfo($id){
        (new IDMustBePositiveInt())->goCheck();
        $data['info'] = InfoModel::getIdInfo($id);
        $data['comment'] = Comment::getComment($id);
        return json($data);
    }

    //回复功能
    public function replyUser(){
        $request = Request::instance();
        $params = $request->post();
        $result = News::replyUser($params);
        return json($result);
    }
}