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
use app\lib\exception\ParamsException;
use think\Controller;
use app\api\model\Info as InfoModel;
use app\api\model\Comment;
use think\Request;
use app\api\service\Token as TokenService;

class Base extends Controller
{
    protected $beforeActionList = [
        'checkToken'  =>  ['only'=>'hello,data'],
    ];
    protected  function checkToken(){
        $request = Request::instance();
        $params = $request->param();
        $token = $params['token'];
        if(!$token){
            throw new ParamsException([
                'token不能为空'
            ]);
        }
        $result = TokenService::verifyToken($token);
        return $result;
    }
//    //根据id进入详细
//    public function getIdInfo($id){
//        (new IDMustBePositiveInt())->goCheck();
//        $data['info'] = $this->dealData(InfoModel::getIdInfo($id));
//        $data['comment'] = $this->dealData(Comment::getComment($id));
//        return json($data);
//    }

    //回复功能
    public function replyUser(){
        $request = Request::instance();
        $params = $request->post();
        $result = News::replyUser($params);
        return json($result);
    }



}