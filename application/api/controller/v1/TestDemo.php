<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/3
 * Time: 21:10
 */

namespace app\api\controller\v1;


use app\api\model\Info;
use app\api\model\News;
use think\Controller;

class TestDemo extends Controller
{
    public function test(){
        $data = Info::all([],'test');
        return json($data);
    }
    public function testNoReadNum($id){
        $result = News::noReadNum($id);
        return json($result);
    }
}