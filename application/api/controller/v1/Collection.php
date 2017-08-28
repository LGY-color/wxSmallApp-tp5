<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/25
 * Time: 10:09
 */

namespace app\api\controller\v1;

use app\api\model\Collection as CollectionModel;
use app\lib\exception\DbException;
use think\Request;

class Collection extends Base
{
    //判断用户是否有收藏
    public function infoCollection($id){
        $result = CollectionModel::infoCollection($id);
        return json($result);
    }
    //用户收藏行为 若未收藏改已收藏 已收藏改未收藏
    public function collectionInfo(){
        $request = Request::instance();
        $params = $request->param();
        $result = CollectionModel::collectionInfo($params);
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

    //获取个人收藏信息
    public function getUserCollection(){
        $request = Request::instance();
        $params = $request->param();
        $page = $params['page'];
        $result = $this->dealTime(CollectionModel::getUserCollection($page));
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