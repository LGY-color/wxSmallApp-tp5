<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/28
 * Time: 15:35
 */

namespace app\api\controller\v1;

use app\api\model\User As UserModel;

class User extends Base
{
    //查看用户信息
    public function getUserInfo(){
        $result = UserModel::getUserInfo();
        return json($result);
    }
    //解锁
    public function toUnlock(){
        $params['cost'] = config('expenses.unlock');
        $result = UserModel::toUnlock($params);
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
}