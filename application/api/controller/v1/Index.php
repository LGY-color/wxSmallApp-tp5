<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/30
 * Time: 16:13
 */

namespace app\api\controller\v1;
use app\api\model\Banner;
use app\api\model\Info;
use app\api\validate\IDMustBePositiveInt;
use app\api\validate\TestValidate;
use think\Controller;
use think\Validate;

class Index extends Base
{
    public function index(){
        $data['banner_img'] = Banner::getBannerImgUrl();
        $data['banner_text'] = Banner::getBannerTextContent();
        $data['top_info'] = Info::getTopInfo();
        $data['star_info'] = Info::getStarInfo();
        $data['xcpd_info'] = Info::getXcpdInfo();
        $data['zgqz_info'] = Info::getZgqzInfo();
        $data['dmcb_info'] = Info::getDmcbInfo();
        $data['essc_info'] = Info::getEsscInfo();
        return json($data);
    }

}