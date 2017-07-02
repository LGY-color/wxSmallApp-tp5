<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/30
 * Time: 16:13
 */

namespace app\api\controller\v1;
use app\api\model\AllItem;
use app\api\model\Banner;
use app\api\model\Dpzr;
use app\api\model\Dwcb;
use app\api\model\Qzdp;
use app\api\model\Qzxx;
use app\api\model\Zgxx;
use app\api\validate\IDMustBePositiveInt;
use app\api\validate\TestValidate;
use think\Controller;
use think\Validate;

class Index extends Controller
{
    public function index($id){

//        $data['banner_img_url'] = Banner::getBannerImgUrl();
//        $data['banner_text_content'] = Banner::getBannerTextContent();
//        $data['dpzr_top_info'] = Dpzr::getDpzrTopInfo();
//        $data['qzdp_top_info'] = Qzdp::getQzdpTopInfo();
//        $data['zgxx_top_info'] = Zgxx::getZgxxTopInfo();
//        $data['qzxx_top_info'] = Qzxx::getQzxxTopInfo();
//        $data['dwcb_top_info'] = Dwcb::getDwcbTopInfo();
//        $data = AllItem::getAllItemTopInfo();
//        return $data;
//        var_dump($data);
//        return json($data);
//        $data = [
//            'name'=>'lgy111111111111111',
//            'email'=>'emailqq.com'
//        ];
//        $validate = new Validate([
//           'name'=>'require|max:10',
//            'email'=>'email'
//        ]);
//        验证器示范
//        $validate = new TestValidate();
//        $result = $validate->check($data);//单独验证
//        echo $result;//只显示一个错误
//        $result = $validate->batch()->check($data);//批量验证
//        var_dump($validate->getError());//显示全部错误

//        $data = [
//            'id'=>$id
//        ];
//        $validate = new IDMustBePositiveInt();
//        $result = $validate->check($data);
        (new IDMustBePositiveInt())->goCheck();
        return $id;
    }
}