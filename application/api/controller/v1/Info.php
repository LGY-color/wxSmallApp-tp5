<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/4
 * Time: 11:03
 */

namespace app\api\controller\v1;


use app\api\model\Comment;
use app\api\validate\IDMustBePositiveInt;
use think\Controller;
use app\api\model\Collection as ColModel;
use think\Request;
use app\api\model\Info as InfoModel;
class Info extends Controller
{
    //筛选条件获取信息
    public function getConditionInfo(){
        $request =Request::instance();
        $params = $request->post();
        $data = InfoModel::getConditionInfo($params);
        return json($data);
    }
    //发布信息
    public function InsertInfo(){
        $request =Request::instance();
        $params = $request->post();
        $result = InfoModel::InsertInfo($params);
        return json($result);
    }
    //更新数据
    public function UpdateInfo(){
        $request =Request::instance();
        $params = $request->post();
        $result = InfoModel::UpdateInfo($params);
        return json($result);
    }
    //获取用户已发布的信息
    public function getPublish($id){
        (new IDMustBePositiveInt())->goCheck();
        $data = InfoModel::getPublish($id);
        return json($data);
    }

    //获取用户收藏信息
    public function getCollection($id){
        (new IDMustBePositiveInt())->goCheck();
        $result = ColModel::getCollection($id);
        return json($result);
    }
    //获取当前用户评论信息
    public function getUserComment($id){
        (new IDMustBePositiveInt())->goCheck();
        $result = Comment::getUserComment($id);
        return json($result);
    }

}