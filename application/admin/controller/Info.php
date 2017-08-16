<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/13
 * Time: 11:22
 */

namespace app\admin\controller;


use app\api\validate\IDMustBePositiveInt;
use app\lib\exception\DbException;
use Qiniu\Auth;
use think\Controller;
use app\admin\model\Info as InfoModel;
use app\admin\model\SmallItem as SmallItemModel;
use app\admin\model\BigItem as BigItemModel;
use app\admin\model\LevelType as LevelTypeModel;
use think\Request;

//use Qiniu\Auth as Auth;
use Qiniu\Storage\BucketManager;
use Qiniu\Storage\UploadManager;

class Info extends BaseController
{
    //信息展示
    public function info(){
        $data = InfoModel::getInfoList();
        $page = $data->render();
        $result['info_list'] = $data;
//        return json($result);
        $this->assign('page',$page);
        $this->assign('result',$result);
        return $this->fetch();
    }
    //根据id获取详情
    public function detail($id){
        (new IDMustBePositiveInt())->goCheck();
        $data['small_item'] = SmallItemModel::getSmallItem();
        $result['small_item'] = self::explodeItem($data['small_item']);
        $data['detail'] = InfoModel::getInfoDetailById($id);
        $result['big_item'] = BigItemModel::getBigItem();
        $result['detail'] = self::explodeDetail($data['detail']);
//        return json($result);
        $this->assign('result',$result);
        return $this->fetch();
//        return json($result);
    }
    //更新信息
    public function updateInfo(){
        $request = Request::instance();
        $params = $request->param();
        $result = InfoModel::updateInfoById($params);
        if($result){
            return adminRes('1','更新成功');
        }else{
            return adminRes('0','更新失败，请重试');
        }
//        return json($result);
    }
    //让信息置顶套红等
    public function setLevel(){
        $request = Request::instance();
        $params = $request->param();
        $result = LevelTypeModel::setLevelStatus($params);
        return json($result);
    }
    //刷新
    public function refresh(){
        $request = Request::instance();
        $params = $request->param();
        $result = InfoModel::refreshById($params);
        if($result){
            return adminRes('1','刷新成功');
        }else{
            return adminRes('0','刷新失败，请重试');
        }
    }
    //删除
    public function del(){
        $request = Request::instance();
        $params = $request->param();
        $result = InfoModel::deleteById($params);
        if($result){
            return adminRes('1','删除成功');
        }else{
            return adminRes('0','删除失败，请重试');
        }
    }
    //新增消息列表
    public function addNews(){
        $data['small_item'] = SmallItemModel::getSmallItem();
        $result['small_item'] = self::explodeItem($data['small_item']);
        $result['big_item'] = BigItemModel::getBigItem();
//        return json($result);
        $this->assign('result',$result);
        return $this->fetch('add');
    }
    //新增信息插入数据库
    public function insertNews(){
        $request = Request::instance();
        $params = $request->param();
        $result = InfoModel::addNews($params);
        if($result){
            return adminRes('1','新增成功');
        }else{
            return adminRes('0','新增失败，请重试');
        }
    }
    //info搜索
    public function searchInfo(){
        $request = Request::instance();
        $params = $request->param();
        $data = InfoModel::searchInfo($params);
        $page = $data->render();
        $result['info_list'] = $data;
//        return json($result);
        $this->assign('page',$page);
        $this->assign('result',$result);
        return $this->fetch('search');
    }
    //更新评论状态
    public function updateStatus(){
        $request = Request::instance();
        $params = $request->param();
        $result = InfoModel::updateStatus($params);
        if($result){
            return adminRes('1','操作成功');
        }else{
            return adminRes('0','操作失败，请重试');
        }
    }
    //七牛云上传图片
    public function uploadImg(){
        return getQiniuToken();
    }
    //处理small分类
    public static function explodeItem($data=[]){
        for ($i=0;$i<count($data);$i++){
            $data[$i]['s_item'] = explode(',',$data[$i]['s_item']);
        }
        return $data;
    }

    //处理small分类
    public static function explodeDetail($data=[]){
        $data[0]['surroundings'] = explode(',',$data[0]['surroundings']);
        $data[0]['shop_facilities'] = explode(',',$data[0]['shop_facilities']);
        $data[0]['hold_credentials'] = explode(',',$data[0]['hold_credentials']);
        $data[0]['img_url'] = explode(',',$data[0]['img_url']);
        return $data;
    }
}