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
//        echo phpinfo();
        $data['banner_img'] = Banner::getBannerImgUrl();
        $data['banner_text'] = Banner::getBannerTextContent();
        $data['new_info'] = $this->dealData(Info::getNewInfo());
        $data['top_info'] = $this->dealData(Info::getTopInfo());
        $data['star_info'] = $this->dealData(Info::getStarInfo());
        $data['xcpd_info'] = Info::getXcpdInfo();
        $data['zgqz_info'] = Info::getZgqzInfo();
        $data['dmcb_info'] = Info::getDmcbInfo();
        $data['essc_info'] = Info::getEsscInfo();
        return json($data);
//        var_dump(Info::getTopInfo());
    }
    public function dealData($data){
        foreach ($data as $k=>$value){
            $data[$k]['img_url'] = explode(',',$value['img_url']);
            $data[$k]['update_time']= date('Y-m-d H:i:s',$value['update_time']);
        }
        return $data;

    }

}