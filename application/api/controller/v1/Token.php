<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/3
 * Time: 22:27
 */

namespace app\api\controller\v1;


use app\api\service\UserToken;
use app\api\validate\TokenGet;
use app\lib\exception\ParamsException;
use app\api\service\Token as TokenService;
use think\Controller;
use think\Request;

class Token extends Controller
{
    //获取token
    public function getToken(){
        (new TokenGet())->goCheck();
        $request = Request::instance();
        $params = $request->param();
        $code = $params['code'];
        $username = $params['username'];
        $img = isset($params['img'])?$params['img']:'';
        $user_token = new UserToken($code,$username,$img);
        $token['token'] = $user_token->get();
        return json($token);
    }
    //验证token
    public function verifyToken(){
        $token = Request::instance()->header('token');
        if(!$token){
            throw new ParamsException([
                'token不允许为空'
            ]);
        }

        $valid = TokenService::verifyToken($token);
        return json([
            'isValid' => $valid
        ])  ;
    }

}