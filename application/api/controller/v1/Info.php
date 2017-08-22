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
use app\lib\exception\DbException;
use think\Controller;
use app\api\model\Collection as ColModel;
use think\Request;
use app\api\model\Info as InfoModel;
class Info extends Base
{
    //筛选条件获取信息
    public function getConditionInfo(){
        $request =Request::instance();
        $params = $request->post();
        $data = $this->dealData(InfoModel::getConditionInfo($params));
        return json($data);
    }
    //根据id进入详细
    public function getIdInfo($id){
        (new IDMustBePositiveInt())->goCheck();
        $data['info'] = $this->dealData(InfoModel::getIdInfo($id));
        $data['comment'] = $this->dealTime(Comment::getComment($id));
        return json($data);
    }
    //根据分类获取信息
    public function getInfoByItem($id){
        (new IDMustBePositiveInt())->goCheck();
        $style = input('style');
        $start = input('page');
        $data = $this->dealData(InfoModel::getInfoByItem($id,$style,$start));
        return json($data);
    }
    //获取更多置顶信息
    public function getMoreTop($page){
        $result = $this->dealData(InfoModel::getTopInfo($page));
        return json($result);
    }
    //获取更多星级信息
    public function getMoreStar($page){
        $result = $this->dealData(InfoModel::getStarInfo($page));
        return json($result);
    }
    //获取更多最新信息
    public function getMoreNew($page){
        $result = $this->dealData(InfoModel::getNewInfo($page));
        return json($result);
    }
    //获取更多小吃盘店信息
    public function getMoreXcpd($page){
        $result = InfoModel::getXcpdInfo($page);
        return json($result);
    }
    //获取更多招工求职信息
    public function getMoreZgqz($page){
        $result = InfoModel::getZgqzInfo($page);
        return json($result);
    }
    //获取更多店面承包信息
    public function getMoreDmcb($page){
        $result = InfoModel::getDmcbInfo($page);
        return json($result);
    }
    //获取更多店面承包信息
    public function getMoreEssc($page){
        $result = InfoModel::getEsscInfo($page);
        return json($result);
    }

    //发布信息
    public function InsertInfo(){
        $request = Request::instance();
        $params = $request->post();
        $params = $this->dealDataByWx($params);
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
    public function getPublish($page){
//        (new IDMustBePositiveInt())->goCheck();
        $data = InfoModel::getPublish($page);
        $data = $this->dealData($data);
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


    //处理sql查出数据
    public function dealData($data){
        foreach ($data as $k=>$value){
            $data[$k]['update_time']= date('Y-m-d H:i:s',$value['update_time']);
            $data[$k]['img_url'] = explode(',',$value['img_url']);
        }
        return $data;
    }
    public function dealTime($data){
        foreach ($data as $k=>$value){
            $data[$k]['update_time']= date('Y-m-d H:i:s',$value['update_time']);
        }
        return $data;
    }

    //处理微信小程序上传的数据
    public function dealDataByWx($data){
        if(isset($data['hold_credentials'])){
            $data['hold_credentials'] = implode(',',$data['hold_credentials']);
        }
        if(isset($data['shop_facilities'])){
            $data['shop_facilities'] = implode(',',$data['shop_facilities']);
        }
        if(isset($data['surroundings'])){
            $data['surroundings'] = implode(',',$data['surroundings']);
        }
        if(isset($data['img_url'])){
            $data['img_url'] = implode(',',$data['img_url']);
        }
        return $data;
    }
}