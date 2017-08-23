<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/23
 * Time: 10:58
 */

namespace app\api\controller\v1;



use app\api\model\LevelType;
use app\lib\exception\DbException;
use think\Request;

class Level extends Base
{
    public function setLevelStatus(){
        $request = Request::instance();
        $params = $request->param();
        $result = LevelType::setLevel($params);
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