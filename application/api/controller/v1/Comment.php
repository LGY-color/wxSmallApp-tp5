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
}