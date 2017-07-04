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
        $data = BigItem::getBigItem();
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

}