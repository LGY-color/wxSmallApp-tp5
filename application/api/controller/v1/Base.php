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
use app\lib\exception\TokenException;
use think\Controller;
use app\api\model\Info as InfoModel;
use app\api\model\Comment;
use think\Request;
use app\api\service\Token as TokenService;

class Base extends Controller
{
    protected $beforeActionList = [
        'checkToken'  =>  ['only'=>'InsertInfo,getPublish,setLevelStatus,setRefresh,setDeal,infoReply,infoCollection,collectionInfo,getUserComment,getNoReadNum,getUserNews,getUserCollection,getUserInfo,toUnlock'],
    ];
    protected  function checkToken(){
        $token = Request::instance()->header('token');
        if(!$token){
            throw new ParamsException([
                'msg'=>'token不能为空'
            ]);
        }
        $result = TokenService::verifyToken($token);
        if(!$result){
            throw new TokenException();
        }else{

        }
        return $result;
    }
    public function getQiniuToken(){
        return getQiniuTokenWx();
    }



}