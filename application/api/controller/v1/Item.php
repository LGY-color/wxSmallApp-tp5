<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/4
 * Time: 8:24
 */

namespace app\api\controller\v1;


use app\api\model\BigItem;
use app\api\model\SmallItem;
use app\api\validate\IDMustBePositiveInt;
use think\Controller;

class Item extends Controller
{
    //获取大分类
    public function getBigItem(){
        $data = $this->dealBigItem(BigItem::getBigItem());
        return json($data);
    }
    //大分类下的子分类
    public function getSmallItem(){
        $data = SmallItem::getSmallItem();
        return json($data);
    }
    //大分类下的子分类 包括筛选条件
    public function getFilterItem($id=''){
        (new IDMustBePositiveInt())->goCheck();
        $data = SmallItem::getFilterItem($id);
        return json($data);
    }
    //根据分类名获取具体的子分类下的条件
    public function getItemByName($id){
        (new IDMustBePositiveInt())->goCheck();
        $data = SmallItem::getItemByName($id);
        array_unshift($data,[
            's_id'=>0,
            's_name'=>'不限',
            'checked'=>true
        ]);
        return json($data);
    }

    //处理子分类
    public function dealBigItem($data){
        foreach ($data as $k=>$v){
            $data[$k]['s_name'] = explode(',',$v['s_name']);
            $data[$k]['s_id'] = explode(',',$v['s_id']);
        }
        return $data;
    }

}