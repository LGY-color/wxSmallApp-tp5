<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/25
 * Time: 17:08
 */

namespace app\api\controller\v1;

use app\api\model\News AS NewsModel;
use think\Request;

class News extends Base
{
    //获取用户未读消息数目
    public function getNoReadNum(){
        $result['noReadNum'] = NewsModel::noReadNum();
        return json($result);
    }
    //获取用户消息
    public function getUserNews(){
        $request =Request::instance();
        $params = $request->param();
        $page = $params['page'];
        $result = NewsModel::getUserNews($page);
        return json($result);
    }
}