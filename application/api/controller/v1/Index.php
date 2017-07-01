<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/30
 * Time: 16:13
 */

namespace app\api\controller\v1;
use app\api\model\Banner;
use app\api\model\Dpzr;
use app\api\model\Qzdp;
use app\api\model\Qzxx;
use app\api\model\Zgxx;
use think\Controller;

class Index extends Controller
{
    public function index(){

        $data['banner_img_url'] = Banner::getBannerImgUrl();
        $data['banner_text_content'] = Banner::getBannerTextContent();
        $data['dpzr_top_info'] = Dpzr::getDpzrTopInfo();
        $data['qzdp_top_info'] = Qzdp::getQzdpTopInfo();
        $data['zgxx_top_info'] = Zgxx::getZgxxTopInfo();
        $data['qzxx_top_info'] = Qzxx::getQzxxTopInfo();
        return json($data);
    }
}