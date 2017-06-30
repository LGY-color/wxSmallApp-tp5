<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/30
 * Time: 16:13
 */

namespace app\api\controller\v1;
use app\api\model\Banner;
use think\Controller;

class Index extends Controller
{
    public function index(){

        $data['banner_img_url'] = Banner::getBannerImgUrl();
        $data['banner_text_content'] = Banner::getBannerTextContent();
        return json($data);
    }
}